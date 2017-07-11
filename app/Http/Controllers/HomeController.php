<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/bmVsm_cover.jpg',
            'img_alt' => 'Batman v Superman',
            'title' => 'Batman v Superman: Dawn of Justice',
            'description' => 'Fearing the actions of Superman is left unchecked, Batman takes on Superman, while the world wrestles with what kind of a hero it really needs. With Batman and Superman fighting each other, a new threat Doomsday is created by Lex Luthor. It\'s up to Superman and Batman to set aside their differences along with Wonder Woman to stop Lex Luthor and Doomsday from destroying Metropolis.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/ss_cover.jpg',
            'img_alt' => 'Suicide Squad',
            'title' => 'Suicide Squad',
            'description' => 'A covert military team made up of the world’s deadliest criminals, the Suicide Squad constantly tests the limits of redemption.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/jl_cover.jpg',
            'img_alt' => 'Justice League',
            'title' => 'Justice League',
            'description' => 'With shared strength, power and courage, SUPERMAN, BATMAN, WONDER WOMAN, THE FLASH, GREEN LANTERN, AQUAMAN, AND CYBORG unite as the Justice League, a legendary team of Super Heroes, standing shoulder-to-shoulder for truth, justice and freedom.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/ww_cover.jpg',
            'img_alt' => 'Wonder Woman',
            'title' => 'Wonder Woman',
            'description' => 'She’s a one-woman army on the side of FREEDOM and JUSTICE, RECOGNIZED and ADMIRED as a beacon of empowerment for girls and women.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/dc_girls_cover.jpg',
            'img_alt' => 'DCSH Girls',
            'title' => 'DC Super Hero Girls',
            'description' => 'Featuring an all-new artistic style and aesthetic, DC Super Hero Girls centers on the female Super Heroes and Super-Villains of DC Comics as they explore their teen years and discover their Super Hero potential.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/dcsf_cover.jpg',
            'img_alt' => 'DC Super Friends',
            'title' => 'DC Super Friends',
            'description' => 'Little kids dream of being big people, and the DC Super Friends is a fresh, unique collection of toys, apparel, home furnishings and more that gives toddlers their very own versions of the World’s Greatest Super Heroes from DC Comics.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/sm_cover.jpg',
            'img_alt' => 'Superman',
            'title' => 'Superman Core',
            'description' => 'Superman is the original and ultimate Super Hero, sworn to protect the citizens of earth. He is a global icon with nearly 100% worldwide awareness and he is the embodiment of justice, honesty, integrity and the power of achievement.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/lb_cover.jpg',
            'img_alt' => 'Lego Batman',
            'title' => 'Lego Batman',
            'description' => 'Following the massive success of The Lego Movie, Batman stars in his very own spin-off movie, where he uses his super powers to battle his legendary foe, The Joker.'
        ));

        array_push($data, array(
            'id' => trim(uniqid('', true), '{}'),
            'img' => 'images/bm_cover.jpg',
            'img_alt' => 'Batman',
            'title' => 'Batman Core',
            'description' => 'Batman is the only Super Hero who started with a purpose, then trained and developed unique abilities and skills to fulfill that purpose. Boys aspire to have his unequaled fighting skills, unique gadgets and vehicles. He has nearly 100% worldwide awareness and has surpassed $9 billion in consumer products retail sales worldwide.'
        ));
        // dd($data);
        return view('home', compact('data'));
    }
}
/*
            <ul class="bxslider hover-effect">
                <li><div class="property_summary">
                        <h3>Batman v Superman: Dawn of Justice</h3>
                        <p>Fearing the actions of Superman is left unchecked, Batman takes on Superman, while the world wrestles with what kind of a hero it really needs. With Batman and Superman fighting each other, a new threat Doomsday is created by Lex Luthor. It's up to Superman and Batman to set aside their differences along with Wonder Woman to stop Lex Luthor and Doomsday from destroying Metropolis.</p>
                    </div>
                    <img src="{{ asset('images/bmVsm_cover.jpg') }}" alt="Batman v Superman" /></li>
                <li><div class="property_summary">
                        <h3>Suicide Squad</h3>
                        <p>A covert military team made up of the world’s deadliest criminals, the Suicide Squad constantly tests the limits of redemption.</p>
                    </div>
                    <img src="{{ asset('images/ss_cover.jpg') }}" alt="Suicide Squad" /></li>
                <li><div class="property_summary">
                        <h3>Justice League</h3>
                        <p>With shared strength, power and courage, SUPERMAN, BATMAN, WONDER WOMAN, THE FLASH, GREEN LANTERN, AQUAMAN, AND CYBORG unite as the Justice League, a legendary team of Super Heroes, standing shoulder-to-shoulder for truth, justice and freedom.</p>
                    </div><img src="{{ asset('images/jl_cover.jpg') }}" alt="Justice League" /></li>
                <li><div class="property_summary">
                        <h3>Wonder Woman</h3>
                        <p>She’s a one-woman army on the side of FREEDOM and JUSTICE, RECOGNIZED and ADMIRED as a beacon of empowerment for girls and women.</p>
                    </div><img src="{{ asset('images/ww_cover.jpg') }}" alt="Wonder Woman" /></li>

                <li><div class="property_summary">
                        <h3>DC Super Hero Girls</h3>
                        <p>Featuring an all-new artistic style and aesthetic, DC Super Hero Girls centers on the female Super Heroes and Super-Villains of DC Comics as they explore their teen years and discover their Super Hero potential.</p>
                    </div><a href="brand_dcgirls.html" style="display:block"><img src="{{ asset('images/dc_girls_cover.jpg') }}" alt="DCSH Girls" /></a></li>
                <li><div class="property_summary">
                        <h3>DC Super Friends</h3>
                        <p>Little kids dream of being big people, and the DC Super Friends is a fresh, unique collection of toys, apparel, home furnishings and more that gives toddlers their very own versions of the World’s Greatest Super Heroes from DC Comics.</p>
                    </div><img src="{{ asset('images/dcsf_cover.jpg') }}" alt="DC Super Friends" /></li>
                <li><div class="property_summary">
                        <h3>Superman Core</h3>
                        <p>Superman is the original and ultimate Super Hero, sworn to protect the citizens of earth. He is a global icon with nearly 100% worldwide awareness and he is the embodiment of justice, honesty, integrity and the power of achievement.</p>
                    </div><img src="{{ asset('images/sm_cover.jpg') }}" alt="Superman" /></li>
                <li><div class="property_summary">
                        <h3>Lego Batman</h3>
                        <p>Following the massive success of The Lego Movie, Batman stars in his very own spin-off movie, where he uses his super powers to battle his legendary foe, The Joker.</p>
                    </div><img src="{{ asset('images/lb_cover.jpg') }}" alt="Lego Batman" /></li>
                <li><div class="property_summary">
                        <h3>Batman Core</h3>
                        <p>Batman is the only Super Hero who started with a purpose, then trained and developed unique abilities and skills to fulfill that purpose. Boys aspire to have his unequaled fighting skills, unique gadgets and vehicles. He has nearly 100% worldwide awareness and has surpassed $9 billion in consumer products retail sales worldwide.</p>
                    </div><img src="{{ asset('images/bm_cover.jpg') }}" alt="Batman" /></li>
            </ul>
*/