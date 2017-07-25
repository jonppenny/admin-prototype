<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentation;
use Intervention\Image\ImageManagerStatic as Image;

class PresentationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::paginate(20);

        return view('admin.pages.presentations', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.presentations-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $full_image    = '';
        $preview_image = '';

        $meta = [
            'section1' => $request->section1,
            'section2' => $request->section2,
            'section3' => $request->section3,
            'section4' => $request->section4,
            'section5' => $request->section5,
        ];

        if ($request->preview_image) {
            $file       = $request->preview_image;
            $image_name = $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            Presentation::saveImage($image_name, $image_path);

            $full_image    = $image_name;
            $preview_image = 'thumbnail-' . $image_name;
        }

        Presentation::create([
            'title'         => $request->title,
            'meta'          => json_encode($meta),
            'preview_image' => $preview_image,
            'full_image'    => $full_image,
        ]);

        return redirect()->to('/admin/presentations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $presentation = Presentation::find($id);

        $id            = $presentation->id;
        $title         = $presentation->title;
        $sections      = json_decode($presentation->meta);
        $preview_image = $presentation->preview_image;

        return view(
            'admin.pages.presentations-edit',
            compact('id', 'title', 'sections', 'preview_image')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $presentation = Presentation::find($id);

        $meta = [
            'section1' => $request->section1,
            'section2' => $request->section2,
            'section3' => $request->section3,
            'section4' => $request->section4,
            'section5' => $request->section5,
        ];

        if ($request->preview_image) {
            $file       = $request->preview_image;
            $image_name = $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            Presentation::saveImage($image_name, $image_path);

            $presentation->preview_image = 'thumbnail-' . $image_name;
            $presentation->full_image    = $image_name;
        } else {
            $presentation->preview_image = '';
            $presentation->full_image    = '';
        }

        $presentation->title = $request->title;
        $presentation->meta = json_encode($meta);

        $presentation->save();

        return redirect()->to('/admin/presentations/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $presentation = Presentation::find($id);
        $presentation->delete();

        return redirect()->to('/admin/presentations');
    }
}
