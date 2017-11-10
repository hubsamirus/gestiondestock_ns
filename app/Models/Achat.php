<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    public $timestamps = false;
    protected $table= "achats";
    protected $fillable =[                           
                           'articleId',
                           'fournisseurId',
                           'quantite',
                           'prixAchat',
                           'dateAchat',                                       
                        ];
}
