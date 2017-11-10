<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $timestamps = false;
    protected $table= "categories";
    protected $primaryKey = 'categorieId';

    protected $fillable =[ 
                           'nomCategorie'                       
                                                                                   
];
    public function articles(){
        return $this->hasMany('App\Models\Article');
    } 
}
