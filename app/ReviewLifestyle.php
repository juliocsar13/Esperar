<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Lifestyle;

class ReviewLifestyle extends Model
{
    protected $table = "review_lifestyle";
    
    protected $primaryKey = 'reli_id';

    protected $fillable = [
        'revi_id', 'life_id'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];

    public function lifestyle()
    {
        return $this->belongsTo(Lifestyle::class, 'life_id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'revi_id');
    }
}
