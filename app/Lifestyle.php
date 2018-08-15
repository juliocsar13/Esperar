<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Lifestyle extends Model
{
    use SoftDeletes;
    
    protected $table = "lifestyle";
    
    protected $primaryKey = 'life_id';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];

    public static function getLifestyles($amount)
    {
        return Lifestyle::all()
            ->take($amount);
    }

    public function getAllLifestyle()
    {
        return Lifestyle::all();
    }

    public function getLifestyleByLife($life_id)
    {
        return Lifestyle::find($life_id);
    }

    public static function getCountAllLifestyle()
    {
        return Lifestyle::all()
            ->count();
    }
}
