<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public $timestamps = false;
    protected $table= "factures";
    protected $primaryKey = 'factureId';
    protected $fillable =['reference','dateFacture','commandeId','userId'];


    public function users(){
        return $this->belongsTo('App\Models\User', 'userId');
    }

      public function commandes(){
        return $this->hasOne('App\Models\Commande', 'commandeId');
    }
}
