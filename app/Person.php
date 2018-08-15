<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Person extends Model
{
    protected $table = "person";
    
    protected $primaryKey = 'pers_id';

    protected $fillable = [
        'pers_id', 'names', 'lastnames', 'birthday', 'address', 'email', 'phone'
    ];

    protected $hidden = [

    ];

    protected $appends = [
        
    ];
}
