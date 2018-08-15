<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Review;
use App\Lifestyle;
use App\Place;
use App\Category;
use App\Image;
use App\ReviewLifestyle;
use DateTime;

class ReviewController extends Controller
{
    private $oReview, $oLifestyle, $oPlace, $oCategory, $oImage;
    private $pathReview = '/frontend/img/review/';
    public function __construct()
    {
        $this->oReview = new Review();
        $this->oLifestyle = new Lifestyle();
        $this->oPlace = new Place();
        $this->oCategory = new Category();
        $this->oImage = new Image();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cReviews = $this
            ->oReview
            ->getAllReview();

        return view('backend.review.index', compact('cReviews'));

    }

    public function list(Request $request)
    {
      $cPlaces = Place::all();
      $cLifestyles = LifeStyle::all();
      $cReviews = Review::all();
      if ($request->country && $request->place && $request->lifestyle) {
          $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');
            })
            ->where([
                ['review.plac_id','=' , $request->place],
                ['place.country','=' , $request->country],
                ['review_lifestyle.life_id','=' , $request->lifestyle],
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city',
                'review_lifestyle.life_id')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }

      }else if ($request->country && $request->place) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');
            })
            ->where([
                ['review.plac_id','=' , $request->place],
                ['place.country','=' , $request->country]
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }

      }else if ($request->country && $request->lifestyle) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');
            })
            ->where([
                ['place.country','=' , $request->country],
                ['review_lifestyle.life_id','=' , $request->lifestyle]
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city',
                'review_lifestyle.life_id')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }else if ($request->place && $request->lifestyle) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');

            })
            ->where([
                ['review.plac_id','=' , $request->place],
                ['review_lifestyle.life_id','=' , $request->lifestyle],
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city',
                'review_lifestyle.life_id')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }else if ($request->country) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');
            })
            ->where([
                ['place.country','=' , $request->country]
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }else if ($request->lifestyle) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');

            })
            ->where([
                ['review_lifestyle.life_id','=' , $request->lifestyle]
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city',
                'review_lifestyle.life_id')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }else if ($request->place) {
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            ->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');

            })
            ->where([
                ['review.plac_id','=' , $request->place]
            ])
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }else if($request->all == "all"){
        $result = DB::table('review')
            ->join('place', 'place.plac_id', 'review.plac_id')
            ->join('category', 'review.cate_id', '=', 'category.cate_id')
            //->join('review_lifestyle', 'review.revi_id', '=', 'review_lifestyle.revi_id')
            ->join('image', function($join){
                $join-> on('review.revi_id','=', 'image.sour_id')
                ->where('type_image', 2)
                ->where('source', 'like','%'.'image-review' .'%');

            })
            ->select('review.*',
                'image.source as image_first',
                'category.name as category_name',
                'review.name as review_name',
                'place.name as place_name',
                'place.country as place_country',
                'place.province as place_province',
                'place.city as place_city')
            ->distinct()
            ->get();
            if ($request->method() == "GET") {
              if ($request->ajax()) {
                return response()->json(array('data' => $result));
              } else {
                  return view('frontend.review.list', compact('cPlaces','cLifestyles', array('data' => $result)));
              }
            }
      }
      return view('frontend.review.list', compact('cPlaces','cLifestyles', 'cReviews'));
    }

    public function filterReviews(Request $request)
    {
        /*$pos = strpos(url()->previous(), 'listar-reviews');

        if ($pos === false) {
            //dd("la cadena listar-reviews no fue encontrada");
            extract($request->all());
        }
        else
        {
            $request = $request->all();

            $slug1 = array_keys($request)[0];

            $slug2 = array_values($request)[0];

            $string = $slug1 . '=' . $slug2;

            $arr = explode("?",url()->previous());

            $arr2 = explode("&", $arr[1]);

            $stringPart = explode("=", $string);

            foreach($arr2 as $i => $value)
            {
                $pos = strpos($value, $stringPart[0]);

                if($pos === false)
                {
                    //dd("no coincide");
                }
                else
                {
                    //dd("coincide" . $i);
                    $arr2[$i] = $string;
                }
            }

            $url = "";

            foreach ($arr2 as $key => $value)
            {
                $url .= ($key ? '&' : '') . $value;

                $val = explode("=", $value);

                $one = $val[0];

                $two = $val[1];

                $$one = $two;
                //$$val[0] = $val[1];

                //dd(get_defined_vars());
            }
        }
        //list($life_id, $plac_id) = array_values($request->all());
        if(! isset($life_id))
        {
            $life_id = "";
        }

        if(! isset($plac_id))
        {
            $plac_id = "";
        }

        if(! isset($coun_id))
        {
            $coun_id = "";
        }
        //dd(get_defined_vars());
        $cReviews = $this
            ->oReview
            ->getReviews($life_id, $plac_id, $coun_id);

        $cCategories = $this
            ->oCategory
            ->getAllCategory();

        $cPlaces = $this
            ->oPlace
            ->getAllPlace();

        $cLifestyles = $this
            ->oLifestyle
            ->getAllLifestyle();

        $placeName = $this
            ->oPlace
            ->getPlaceByPlac($plac_id) ? $this
            ->oPlace
            ->getPlaceByPlac($plac_id) : null;

        $countryName = $coun_id ? $coun_id : null;

        $lifestyleName = $this
            ->oLifestyle
            ->getLifestyleByLife($life_id) ?
            $this->oLifestyle->getLifestyleByLife($life_id) : null;
        //dd("filter Reviews");

        return view('frontend.review.list', compact('cReviews', 'cCategories', 'cLifestyles', 'lifestyleName', 'placeName', 'countryName', 'cPlaces'));*/
    }

    public function remove(Request $request)
    {
        $request = $request->all();

        $string = array_keys($request)[0] . '=' . array_values($request)[0];

        $arr = explode("?",url()->previous());

        $arr2 = explode("&", $arr[1]);

        if(in_array($string, $arr2))
        {
            $index = array_search($string, $arr2);

            $part = explode("=", $arr2[$index]);
            $part = $part[0] . '=';

            $arr2[$index] = $part;
            //unset($arr2[$index]);

            $url = "";
            foreach ($arr2 as $key => $value) {
                $url .= '&' . $value;
            }

            return redirect()
                ->route('reviews.filter', $url);
        }
        else
        {
            dd("no existe");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result_cPlaces = DB::table('place')->get();
        $result_cLifestyle = DB::table('lifestyle')->get();
        $result_cCategories = DB::table('category')->get();
        $cPlaces = json_decode($result_cPlaces, true);
        $cLifestyle = json_decode($result_cLifestyle, true);
        $cCategories = json_decode($result_cCategories, true);
        return view('backend.review.create', compact('cPlaces', 'cLifestyle', 'cCategories'));

        //return view('backend.review.create', compact('cPlaces', 'cLifestyle', 'cReviews', 'cCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $validator = Validator::make($request, [
            'name' => 'required|string|max:100',
            'latitud' => 'required|string|max:100',
            'longitud' => 'required|string|max:100',
            'calification' => 'required|string|max:100',
        ]);
        if($validator->passes()){
            $slug = str_slug($request['name'], '-');
            $request["slug"] = $slug;
            $oReview = Review::create($request);
            $date_ = new DateTime();
            $result = $date_->format('Y-m-d H:i:s');
            $date = str_slug($result, '-');
            if (isset($request['image'])) {
              foreach(['image'] as $field)
              {
                  if(isset($request[$field]))
                  {
                      foreach($request[$field] as $key => $image)
                      {
                          $oValidate = Validator::make($request[$field], [
                              $field => 'image|mimes:jpeg,png,jpg|max:2048',
                          ]);
                          if($oValidate->fails())
                          {
                              $errors = $oValidate->messages()->messages()[$field];
                              return redirect()->route('review.create')->with('errors', $errors);
                          }
                          $path = $this->pathReview;
                          $destinationPath = public_path($path);
                          $name = $image->getClientOriginalName();
                          $imageName = $path.$field.'-review-'.$key.'-'.$date.'-'.time().'-'.$name;
                          $image->move($destinationPath, $imageName);
                          $image = $imageName;
                          $oImage = Image::create([
                              'source' => $image,
                              'sour_id' => $oReview->revi_id,
                              'type_image' => 2
                          ]);
                      }
                }
              }
            }
            if (isset($request['image_new'])) {
              foreach(['image_new'] as $key => $field)
              {
                  if(isset($request[$field]))
                  {
                      foreach($request[$field] as $key => $image)
                      {
                          $oValidate = Validator::make($request[$field], [
                            $field => 'image|mimes:jpeg,png,jpg|max:2048',
                          ]);
                          if($oValidate->fails())
                          {
                              $errors = $oValidate
                              ->messages()
                              ->messages()[$field];
                              return redirect()
                                  ->route('review.create')
                                  ->with('errors', $errors);
                          }
                          $path = $this->pathReview;
                          $destinationPath = public_path($path);
                          $name = $image->getClientOriginalName();
                          $imageName = $path.$field.'-review-'.$key.'-'.$date.'-'.time().'-'.$name;
                          $image->move($destinationPath, $imageName);
                          $image = $imageName;
                          Image::create([
                              'source' => $image,
                              'sour_id' => $oReview->revi_id,
                              'type_image' => 2
                          ]);

                      }
                }
              }
            }
            if(isset($request['lifestyle']))
            {
                for ($i = 0; $i < count($request['lifestyle']); $i++)
                {
                    ReviewLifestyle::create([
                        'revi_id' => $oReview->revi_id,
                        'life_id' => $request['lifestyle'][$i],
                    ]);
                }
            }
        }
        else
        {
            return redirect()
                ->route('review.create')
                ->with('errors', "Existen errores, intentar nuevamente.");
        }
        return redirect()
            ->route('review.create')
            ->with('status', TRUE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $oReview = $this->oReview->getReviewBySlug($slug);
        $images = $this->oImage->getAllImagesByReview($oReview->revi_id)->get();
        $url = 'http://www.escapar.me/reviews/'.$oReview->slug;
        $apiUrl = 'https://graph.facebook.com/?ids='.$url;
        $ch = curl_init();
        $timeout=5;
        curl_setopt($ch,CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result,true);
        $cLikes = number_format($data[$url]['share']['share_count']);
        $cImages = json_decode($images, true);
        return view('frontend.review.index', compact('oReview', 'cImages', 'cLikes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oReview = $this->oReview
            ->getReviewByRevi($id);

        $cPlaces = $this->oPlace
            ->getAllPlace();

        $aReviewLifestyle = array_keys($oReview->reviewLifestyles->keyBy('life_id')->toArray());

        $cCategories = $this->oCategory
            ->getAllCategory();

        $cLifestyle = $this
            ->oLifestyle
            ->getAllLifestyle();

        $cImages = $this
            ->oImage
            ->getAllImagesByReview($id)
            ->get();

        return view('backend.review.edit', compact('cPlaces', 'cLifestyle', 'oReview', 'cCategories', 'aReviewLifestyle', 'cImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = $request->all();
        //dd($request['image_new']);

        $date_ = new DateTime();
        $result = $date_->format('Y-m-d H:i:s');
        $date = str_slug($result, '-');
        $validator = Validator::make($request, [
            'name' => 'required|string|max:100',
            'latitud' => 'required|string|max:100',
            'longitud' => 'required|string|max:100',
            'calification' => 'required|string|max:100',
        ]);
        if($validator->passes())
        {
            $oReview = Review::updateOrCreate(['revi_id' => $id], $request);
            $validator2 = Validator::make($request, [
                'image' => 'required',
            ]);
            $validator3 = Validator::make($request, [
                'image_new' => 'required',
            ]);
            if(isset($request['lifestyle']))
            {
                $aLifestyle = $request['lifestyle'];
                if($oReview->reviewLifestyles->count())
                {
                    $oReview
                        ->reviewLifestyles
                        ->map(function ($reviewLifestyle) {
                            $reviewLifestyle->delete();
                        });
                }
                for ($i = 0; $i < count($aLifestyle); $i++)
                {
                    ReviewLifestyle::create([
                        'revi_id' => $id,
                        'life_id' => $aLifestyle[$i],
                    ]);
                }
            }
            if ($validator2->passes()) {
              foreach(['image'] as $key => $field)
              {
                  if(isset($request[$field]))
                  {
                      foreach($request[$field] as $key => $image)
                      {
                          $oValidate = Validator::make($request[$field], [
                              $field => 'image|mimes:jpeg,png,jpg|max:2048',
                          ]);
                          if($oValidate->fails())
                          {
                              $errors = $oValidate
                              ->messages()
                              ->messages()[$field];
                              return redirect()
                                  ->route('review.edit', $id)
                                  ->with('errors', $errors);
                          }
                          $path = $this->pathReview;
                          $destinationPath = public_path($path);
                          $name = $image->getClientOriginalName();
                          $imageName = $path.$field.'-review-'.$key.'-'.$date.'-'.time().'-'.$name;
                          $image->move($destinationPath, $imageName);
                          $image = $imageName;
                          $findImage = Image::where('image.sour_id', '=', $oReview->revi_id)
                                              ->where('source', 'like','%'.'image-review' .'%')
                                              ->get();

                          if (count($findImage)!=0) {
                            Image::updateOrCreate(['imag_id' => $findImage[0]['imag_id']], [
                                'source' => $image,
                                'sour_id' => $oReview->revi_id,
                                'type_image' => 2
                            ]);
                          }else {

                             Image::create([
                              'source' => $image,
                              'sour_id' => $oReview->revi_id,
                              'type_image' => 2
                            ]);
                          }
                      }
                  }
              }
            }
            if ($validator3->passes()) {

              foreach(['image_new'] as $field)
              {
                  if(isset($request[$field]))
                  {
                      foreach($request[$field] as $key => $image)
                      {
                        $oValidate = Validator::make($request[$field], [
                            $field => 'image|mimes:jpeg,png,jpg|max:2048',
                        ]);

                        if($oValidate->fails())
                        {
                            $errors = $oValidate
                            ->messages()
                            ->messages()[$field];

                            return redirect()
                                ->route('review.edit', $id)
                                ->with('errors', $errors);
                        }
                        $path = $this->pathReview;
                        $destinationPath = public_path($path);
                        $name = $image->getClientOriginalName();
                        $imageName = $path.$field.'-review-'.$key.'-'.$date.'-'.time().'-'.$name;
                        $image->move($destinationPath, $imageName);
                        $image = $imageName;

                        if ($key!=1 || $key > 10) {
                          Image::updateOrCreate(['imag_id' => $key], [
                            'source' => $image,
                            'sour_id' => $oReview->revi_id,
                            'type_image' => 2
                          ]);
                        }else{
                          Image::create([
                              'source' => $image,
                              'sour_id' => $oReview->revi_id,
                              'type_image' => 2
                          ]);
                        }
                      }
                  }
              }
            }
        }
        else
        {
          return redirect()
              ->route('review.edit')
              ->with('errors', "Existen errores, intentar nuevamente.");
        }
        return redirect()
            ->route('review.edit', $id)
            ->with('status', TRUE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $review = Review::destroy($id);
        return response()->json(array('data'=>$review));
    }

    public function hidden(Request $request)
    {
      $id = $request->id;
      $value = $request->value;
      $result = Review::updateOrCreate([ 'revi_id' => $id ], [ 'state' => $value ]);

      $cReviews = $this->oReview->getAllReview();
      return response()->json(array('data' => $result));
    }
}
