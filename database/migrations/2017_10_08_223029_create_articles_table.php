<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{

		Schema::create('articles', function(Blueprint $table) {
			$table->increments('articleId');
			$table->string('image');
			$table->integer('categorieId')->unsigned();
			$table->string('nomArticle', 50);
			$table->text('descriptionArticle');
			$table->decimal('prixUnitaire');
			$table->integer('quantite');
			$table->integer('quantiteMin');
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}