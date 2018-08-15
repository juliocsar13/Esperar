<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = "category";
    
    protected $primaryKey = 'cate_id';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];

    public function getAllCategory()
    {
        return Category::all();
    }

    public function getCategoryByCate($cate_id)
    {
        return Category::findOrFail($cate_id);
    }

    public static function getCountAllCategory()
    {
        return Category::all()
            ->count();
    }
}
