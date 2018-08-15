<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use App\ReviewLifestyle;

use App\Image;

use App\Category;

use App\Place;

class Review extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected $table = "review";

    protected $primaryKey = 'revi_id';

    protected $fillable = [
        'name', 'calification', 'latitud',
        'longitud', 'description', 'plac_id',
        'cate_id', 'valoration', 'slug', 'state',
    ];

    protected $hidden = [

    ];

    protected $appends = [
        'images'
    ];

    //Accesors
    public function getImagesAttribute($value)
    {
        return Image::getAllImagesByReview($this->revi_id)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'plac_id');
    }

    public function reviewLifestyles()
    {
        return $this->hasMany(ReviewLifestyle::class, 'revi_id');
    }

    public function getAllReview()
    {
        return Review::all();
    }

    public function getReviewBySlug($slug)
    {
        return Review::where('slug', $slug)
            ->firstOrFail();
    }

    public function getReviews($life_id, $plac_id, $coun_id)
    {
        //existe life_id pero no plac_id
        if($life_id && ! $plac_id && ! $coun_id)
        {//dd("existe life_id pero no plac_id");
            $review = Review::all();

            return $review->filter(function ($review) use ($life_id){
                return $review->reviewLifestyles->filter(function ($reviewLifestyle) use ($life_id){
                    return $reviewLifestyle->life_id == $life_id;
                })->count();
            });
        }
        //no existe life_id ni plac_id
        if(! ($life_id || $plac_id || $coun_id))
        {//dd("no existe life_id ni plac_id");
            return Review::all();
        }
        //dd("existe life_id y plac_id");
        //existe life_id y plac_id
        $filter = Review::where('plac_id', $plac_id)
            ->get();
        //si existe filtro por pais
        if($coun_id)
        {
            $filter = $filter
                ->filter(function ($review) use ($coun_id){
                    return $review->place->country == $coun_id;
                });
        }

        if($life_id)
        {
            $filter = $filter
                ->filter(function ($review) use ($life_id){
                return $review->reviewLifestyles->filter(function ($reviewLifestyle) use ($life_id) {
                    return $reviewLifestyle->life_id == $life_id;
                })->count();
            });
        }

        return $filter;
    }

    public function getReviewByRevi($revi_id)
    {
        return Review::findOrFail($revi_id);
    }

    public static function getCountAllReview()
    {
        return Review::all()
            ->count();
    }
}
