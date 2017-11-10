<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCmd extends Model
{
    protected $table = 'articles_cmds';
    public $timestamps = false;
    protected $fillable = array('articleId', 'commandeId', 'quantite');
}
