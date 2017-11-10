<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public $timestamps = false;
    protected $table= "commandes";
    protected $primaryKey = 'commandeId';
    
    protected $fillable =[  
                           'commandeId',                         
                           'dateCommande',
                           'montant',
                           'userId'                                 
  ];

    public function artilcles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','id');
    }

    public function factures()
    {
        return $this->belongsTo('App\Models\Facture');
    }
}
