<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFournisseursTable extends Migration {

	public function up()
	{
		Schema::create('fournisseurs', function(Blueprint $table) {
			$table->increments('fournisseurId');
			$table->string('nomFournisseur', 30);
			$table->string('raisonSocial', 50);
			$table->string('telephone', 15);
			$table->string('adresse', 190);
			$table->string('email', 50);
			$table->string('pays', 20);
		});
	}

	public function down()
	{
		Schema::drop('fournisseurs');
	}
}