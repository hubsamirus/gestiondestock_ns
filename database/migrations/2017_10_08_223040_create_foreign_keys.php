<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->foreign('categorieId')->references('categorieId')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('achats', function(Blueprint $table) {
			$table->foreign('articleId')->references('articleId')->on('articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('achats', function(Blueprint $table) {
			$table->foreign('fournisseurId')->references('fournisseurId')->on('fournisseurs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('commandes', function(Blueprint $table) {
			$table->foreign('userId')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('factures', function(Blueprint $table) {
			$table->foreign('commandeId')->references('commandeId')->on('commandes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('factures', function(Blueprint $table) {
			$table->foreign('userId')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('articles_cmds', function(Blueprint $table) {
			$table->foreign('articleId')->references('articleId')->on('articles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('articles_cmds', function(Blueprint $table) {
			$table->foreign('commandeId')->references('commandeId')->on('commandes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->dropForeign('articles_categorieId_foreign');
		});
		Schema::table('achats', function(Blueprint $table) {
			$table->dropForeign('achats_articleId_foreign');
		});
		Schema::table('achats', function(Blueprint $table) {
			$table->dropForeign('achats_fournisseurId_foreign');
		});
		Schema::table('commandes', function(Blueprint $table) {
			$table->dropForeign('commandes_userId_foreign');
		});
		Schema::table('factures', function(Blueprint $table) {
			$table->dropForeign('factures_commandeId_foreign');
		});
		Schema::table('factures', function(Blueprint $table) {
			$table->dropForeign('factures_userId_foreign');
		});
		Schema::table('articles_cmds', function(Blueprint $table) {
			$table->dropForeign('articles_cmds_articleId_foreign');
		});
		Schema::table('articles_cmds', function(Blueprint $table) {
			$table->dropForeign('articles_cmds_commandeId_foreign');
		});
	}
}