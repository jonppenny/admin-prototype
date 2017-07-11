<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentation;
use Intervention\Image\ImageManagerStatic as Image;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::all();

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
        $meta = [
            'section1' => $request->section1,
            'section2' => $request->section2,
            'section3' => $request->section3,
            'section4' => $request->section4,
            'section5' => $request->section5,
        ];

        $file       = $request->preview_image;
        $image_name = $file->getClientOriginalName();
        $image_path = $file->getRealPath();

        Presentation::saveImage($image_name, $image_path);

        Presentation::create([
            'title'         => $request->title,
            'meta'          => json_encode($meta),
            'preview_image' => 'thumbnail-' . $image_name,
            'full_image'    => $image_name,
        ]);

        return redirect()->to('/admin/presentations/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
