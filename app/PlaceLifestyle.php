<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Lifestyle;

class PlaceLifestyle extends Model
{
    protected $table = "place_lifestyle";
    
    protected $primaryKey = 'plli_id';

    protected $fillable = [
        'plac_id', 'life_id'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];

    public function lifestyle()
    {
        return $this->belongsTo(Lifestyle::class, 'life_id');
    }
}
