<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Place;

use App\Lifestyle;

use App\Review;

class HomeController extends Controller
{
    private $oPlace, $oLifestyle, $oReview;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->oPlace = new Place();

        $this->oLifestyle = new Lifestyle();

        $this->oReview = new Review();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cPlaces = $this
            ->oPlace
            ->getAllPlace();

        $cLifestyles = $this
            ->oLifestyle
            ->getAllLifestyle();

        $cReviews = $this
            ->oReview
            ->getAllReview()
            ->sortByDesc('revi_id')
            ->take(10);

        return view('frontend.home', compact('cPlaces', 'cLifestyles', 'cReviews'));
    }
    public function us()
    {
        return view('frontend.us');
    }
}

//"SELECT * FROM usuarios ORDER BY id DESC LIMIT 10";  