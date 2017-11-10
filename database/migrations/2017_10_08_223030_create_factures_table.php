<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturesTable extends Migration {

	public function up()
	{
		Schema::create('factures', function(Blueprint $table) {
			$table->increments('factureId');
			$table->string('reference')->unique();
			$table->datetime('dateFacture');
			$table->integer('commandeId')->unsigned();
			$table->integer('userId')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('factures');
	}
}