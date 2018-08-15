<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Lifestyle;
use App\Review;
use App\Place;
use App\Image;

class ImageController extends Controller
{
    private $oPlace, $oLifestyle, $oReview;
    public function __construct()
    {
        $this->oPlace = new Place();
        $this->oLifestyle = new Lifestyle();
        $this->oReview = new Review();
    }
    public function index()
    {

    }
    public function destroy(Request $request, $id)
    {
      $image = Image::where('imag_id', $id)->get();
      $cImage = json_decode($image, true);
      Image::destroy($id);
      //$images = Storage::delete(__DIR__ .$cImage[0]['source']);
      //dd($images);
      return response('status', 200);
    }
}
