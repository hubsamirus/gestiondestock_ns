<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeTemp extends Model
{
    public $timestamps = false;
    protected $table= "commande_temps";
    protected $fillable =['articleId','nomArticle', 'prixUnitaire','montant'];


    public function articles(){
        return $this->belongsTo('App\Models\Categorie', 'articleId');
    }
    
}
