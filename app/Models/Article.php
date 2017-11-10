<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    protected $table= "articles";
    protected $primaryKey = 'ArticleId';
    protected $fillable =['image','categorieId','nomCategorie','nomArticle','descriptionArticle','prixUnitaire','quantite', 'quantiteMin'];


    public function categories(){
        return $this->belongsTo('App\Models\Categorie', 'categorieId');
    }
    
    public function fournisseurs()
    {
        return $this->belongsToMany('App\Models\Fournisseur');
    }

       public function commandes()
    {
        return $this->belongsToMany('App\Models\Commande');
    }
}
