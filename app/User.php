<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email',  'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_Admin(){

        if($this->admin){

            return true;
        }
       return false;
    }

    public function commande()
    {
        return $this->belongsToMany('App\Models\Commande');
    }

     public function facture(){
        return $this->hasMany('App\Models\Facture');
    }
}
