<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    public $timestamps = false;
    protected $table= "fournisseurs";
    protected $primaryKey = 'fournisseurId';


    protected $fillable =[
                           'nomFournisseur',
                           'raisonSocial',                          
                           'telephone',
                           'adresse',
                           'email',                           
                           'pays'
                        ];
    
   
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }
}
