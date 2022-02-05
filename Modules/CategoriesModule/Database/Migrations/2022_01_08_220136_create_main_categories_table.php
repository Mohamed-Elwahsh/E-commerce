<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMainCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('main_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('translation_lang', 10);
			$table->integer('translation_of')->unsigned();
			$table->string('name', 150);
			$table->string('slug', 150)->nullable();
			$table->string('photo', 150)->nullable();
			$table->tinyInteger('active')->default('1');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('main_categories');
	}
}