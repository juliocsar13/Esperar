<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\MyOwnResetPassword;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = "users";
    
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password', 
        'user_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    const ADMIN = 10;

    const USER = 20;

    public static $status = [
        self::ADMIN => 'Admin',
        self::USER => 'User'
    ];

}
