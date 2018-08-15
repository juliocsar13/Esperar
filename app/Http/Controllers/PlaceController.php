<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Place;

use App\Lifestyle;

use App\PlaceLifestyle;

use App\Image;
use DateTime;

class PlaceController extends Controller
{
    private $oPlace, $oLifestyle, $oImage;

    private $pathPlace = '/frontend/img/place/';

    public function __construct()
    {
        $this->oPlace = new Place();

        $this->oLifestyle = new Lifestyle();

        $this->oImage = new Image();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cPlaces = $this
            ->oPlace
            ->getAllPlace();

        return view('backend.place.index', compact('cPlaces'));
    }

    public function list()
    {
        $cPlaces = $this
            ->oPlace
            ->getAllPlace();

        return view('frontend.place.list', compact('cPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cPlaces = $this->oPlace
            ->getAllPlace();

        $cLifestyle = $this
            ->oLifestyle
            ->getAllLifestyle();

        return view('backend.place.create', compact('cPlaces', 'cLifestyle'));
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
            'country' => 'required|string',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'latitud' => 'required|string|max:100',
            'longitud' => 'required|string|max:100',
        ]);
        if($validator->passes())
        {
            $slug = str_slug($request['name'], '-');
            $request["slug"] = $slug;
            $oPlace = Place::create($request);
            $date_ = new DateTime();
            $result = $date_->format('Y-m-d H:i:s');
            $date = str_slug($result, '-');
            if ($request['image']) {
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
                              return redirect()->route('lugar.create')->with('errors', $errors);
                          }
                          $path = $this->pathPlace;
                          $destinationPath = public_path($path);
                          $name = $image->getClientOriginalName();
                          $imageName = $path.$field.'-place-'.$key.'-'.$date.'-'.time().'-'.$name;
                          $image->move($destinationPath, $imageName);
                          $image = $imageName;
                          $oImage = Image::create([
                              'source' => $image,
                              'sour_id' => $oPlace->plac_id,
                              'type_image' => 1
                          ]);
                      }
                  }
              }
            }
            if ($request['image_new']) {
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
                              $errors = $oValidate->messages()->messages()[$field];
                              return redirect()->route('lugar.create')->with('errors', $errors);
                          }
                          $path = $this->pathPlace;
                          $destinationPath = public_path($path);
                          $name = $image->getClientOriginalName();
                          $imageName = $path.$field.'-place-'.$key.'-'.$date.'-'.time().'-'.$name;
                          $image->move($destinationPath, $imageName);
                          $image = $imageName;
                          Image::create([
                              'source' => $image,
                              'sour_id' => $oPlace->plac_id,
                              'type_image' => 1
                          ]);
                      }
                    }
                  }
            }
            if(isset($request['lifestyle']))
            {
                $aLifestyle = $request['lifestyle'];
                for ($i = 0; $i < count($aLifestyle); $i++)
                {
                    $oPlaceLifestyle = PlaceLifestyle::create([
                        'plac_id' => $oPlace->plac_id,
                        'life_id' => $aLifestyle[$i],
                    ]);
                }
            }
        }
        else
        {
            return redirect()
                ->route('lugar.create')
                ->with('errors', "Existen errores, intentar nuevamente.");
        }

        return redirect()
            ->route('lugar.create')
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
        $oPlace = $this
            ->oPlace
            ->getPlaceBySlug($slug);

        $images = $this
            ->oImage
            ->getAllImagesByPlace($oPlace->plac_id)
            ->get();
        $url = 'http://www.escapar.me/lugares/'.$oPlace->slug;
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

        return view('frontend.place.index', compact('oPlace', 'cImages', 'cLikes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oPlace = $this
            ->oPlace
            ->getPlaceByPlac($id);

        $aPlaceLifestyle = array_keys($oPlace->placeLifestyles->keyBy('life_id')->toArray());

        $cLifestyle = $this
            ->oLifestyle
            ->getAllLifestyle();

        $cImages = $this
            ->oImage
            ->getAllImagesByPlace($id)
            ->get();

        return view('backend.place.edit', compact('oPlace', 'cLifestyle', 'aPlaceLifestyle', 'cImages'));
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
        $date_ = new DateTime();
        $result = $date_->format('Y-m-d H:i:s');
        $date = str_slug($result, '-');
        $request = $request->all();
        $validator = Validator::make($request, [
            'name' => 'required|string|max:100',
            'country' => 'required|string',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'latitud' => 'required|string|max:100',
            'longitud' => 'required|string|max:100',
        ]);
        if($validator->passes())
        {
            $oPlace = Place::updateOrCreate(['plac_id' => $id], $request);
            $validator2 = Validator::make($request, [
                'image' => 'required',
            ]);
            $validator3 = Validator::make($request, [
                'image_new' => 'required',
            ]);
            if(isset($request['lifestyle'])){
                $aLifestyle = $request['lifestyle'];
                if($oPlace->placeLifestyles->count())
                {
                    $oPlace
                        ->placeLifestyles
                        ->map(function ($placeLifestyle) {
                            $placeLifestyle->delete();
                        });
                }
                for ($i = 0; $i < count($aLifestyle); $i++)
                {
                    PlaceLifestyle::create([
                        'plac_id' => $id,
                        'life_id' => $aLifestyle[$i],
                    ]);
                }
            }
            if ($validator2->passes()) {
              if ($request['image']) {
                foreach(['image'] as  $field)
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
                                    ->route('lugar.edit', $id)
                                    ->with('errors', $errors);
                            }

                            $path = $this->pathPlace;
                            $destinationPath = public_path($path);
                            $name = $image->getClientOriginalName();
                            $imageName = $path.$field.'-place-'.$key.'-'.$date.'-'.time().'-'.$name;
                            $image->move($destinationPath, $imageName);
                            $image = $imageName;

                            $findImage = Image::where('image.sour_id', '=', $oPlace->plac_id)
                                                ->where('source', 'like','%'.'image-place' .'%')
                                                ->get();

                            if (count($findImage)!=0) {
                              Image::updateOrCreate(['imag_id' => $findImage[0]['imag_id']], [
                                  'source' => $image,
                                  'sour_id' => $oPlace->plac_id,
                                  'type_image' => 1
                              ]);
                            }else{
                              Image::create([
                                  'source' => $image,
                                  'sour_id' => $oPlace->plac_id,
                                  'type_image' => 1
                              ]);
                            }
                        }
                    }
                }

              }
            }
            if ($validator3->passes()) {
              if ($request['image_new']) {
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
                                    ->route('lugar.edit', $id)
                                    ->with('errors', $errors);
                            }
                            $path = $this->pathPlace;
                            $destinationPath = public_path($path);
                            $name = $image->getClientOriginalName();
                            $imageName = $path.$field.'-place-'.$key.'-'.$date.'-'.time().'-'.$name;
                            $image->move($destinationPath, $imageName);
                            $image = $imageName;
                            if ($key!=1 || $key > 10) {
                              Image::updateOrCreate(['imag_id' => $key], [
                                'source' => $image,
                                'sour_id' => $oPlace->plac_id,
                                'type_image' => 1
                              ]);
                            }else{
                              Image::create([
                                  'source' => $image,
                                  'sour_id' => $oPlace->plac_id,
                                  'type_image' => 1
                              ]);
                            }
                        }
                    }
                }
              }
            }
        }
        else
        {
            return redirect()
                ->route('lugar.edit')
                ->with('errors', "Existen errores, intentar nuevamente.");
        }
        return redirect()
            ->route('lugar.edit', $id)
            ->with('status', TRUE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $place = Place::destroy($id);
      return response()->json(array('data'=>$place));
    }
    public function hidden(Request $request)
    {
      $id = $request->id;
      $value = $request->value;
      $result = Place::updateOrCreate([ 'plac_id' => $id ], [ 'state' => $value ]);

      return response()->json(array('data' => $result));
    }
}
