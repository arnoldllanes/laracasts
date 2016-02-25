<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function scopeName($query){
    //     $query->where('name', '=', 'Testing');
    // }

    //User can have many articles  php artisan tinker with grabbing a user ($user = App\User::first(); and stating $user->articles->toArray()
    public function articles()
    {
        return $this->hasMany('App\Article', 'user_id');
    }

    public function isATeamManager()
    {
        return true;
    }

    public function isLoggedIn()
    {
        if (! Auth::check()) {
        
            return true;
        
        } else {
        
            return false;
        }
    
    }

}
