<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandesTable extends Migration {

	public function up()
	{
		Schema::create('commandes', function(Blueprint $table) {
			$table->increments('commandeId');
			$table->date('dateCommande');
			$table->decimal('montant');
			$table->integer('userId')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('commandes');
	}
}