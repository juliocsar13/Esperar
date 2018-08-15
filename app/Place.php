<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\PlaceLifestyle;

use Cviebrock\EloquentSluggable\Sluggable;

class Place extends Model
{
    use Sluggable;

    use SoftDeletes;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected $table = "place";

    protected $primaryKey = 'plac_id';

    protected $fillable = [
        'name', 'country', 'province',
        'city', 'latitud', 'longitud',
        'valoration', 'calification',
        'description', 'slug','state'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        'images'
    ];

    const ALPHABET = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    const ARGENTINA = 10;

    const CHILE = 20;

    const BRASIL = 30;

    const URUGUAY = 40;

    const PARAGUAY = 50;

    public static $country = [
        self::ARGENTINA => 'Argentina',
        self::CHILE => 'Chile',
        self::BRASIL => 'Brasil',
        self::URUGUAY => 'Uruguay',
        self::PARAGUAY => 'Paraguay',
    ];

    //Accesors
    public function getImagesAttribute($value)
    {
        return Image::getAllImagesByPlace($this->plac_id)
            ->get();
    }

    public function placeLifestyles()
    {
        return $this->hasMany(PlaceLifestyle::class, 'plac_id');
    }

    public function getAllPlace()
    {
        return Place::all();
    }

    public function getPlaceByPlac($plac_id)
    {
        return Place::find($plac_id);
    }

    public function getPlaceBySlug($slug)
    {
        return Place::where('slug', $slug)
            ->firstOrFail();
    }

    public static function getCountAllPlace()
    {
        return Place::all()
            ->count();
    }
}
