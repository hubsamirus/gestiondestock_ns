<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articleId')->unsigned();
            $table->string('nomArticle');
            $table->decimal('montant');
            $table->decimal('prixUnitaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_temps');
    }
}
