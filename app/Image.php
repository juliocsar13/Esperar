<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "image";
    
    protected $primaryKey = 'imag_id';

    protected $fillable = [
        'source', 'sour_id','type_image'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];

    public function getImageByImag($imag_id)
    {
        return Image::findOrFail($imag_id);
    }

    public function getAllImagesBySourId($sour_id)
    {
        return Image::where('sour_id', $sour_id);
    }

    public static function getAllImagesByReview($revi_id)
    {
        return Image::where('sour_id', $revi_id)->where('type_image', 2);
    }
    public static function getAllImagesByPlace($place_id)
    {
        return Image::where('sour_id', $place_id)->where('type_image', 1);
    }
}
