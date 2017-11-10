<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesCmdsTable extends Migration {

	public function up()
	{
		Schema::create('articles_cmds', function(Blueprint $table) {
			$table->increments('articlecmdId');
			$table->integer('articleId')->unsigned();
			$table->integer('commandeId')->unsigned();
			$table->integer('quantite')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('articles_cmds');
	}
}