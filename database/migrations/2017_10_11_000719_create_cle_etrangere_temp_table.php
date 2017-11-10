<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleEtrangereTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      	Schema::table('commande_temps', function(Blueprint $table) {
			$table->foreign('articleId')->references('articleId')->on('articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        	Schema::table('commande_temps', function(Blueprint $table) {
			$table->dropForeign('commande_temps_articleId_foreign');
		});
    }
}
