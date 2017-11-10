<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAchatsTable extends Migration {

	public function up()
	{
		Schema::create('achats', function(Blueprint $table) {
			$table->increments('achatId');
			$table->integer('articleId')->unsigned();
			$table->integer('fournisseurId')->unsigned();
			$table->integer('quantite')->unsigned();
			$table->datetime('dateAchat');
		});
	}

	public function down()
	{
		Schema::drop('achats');
	}
}