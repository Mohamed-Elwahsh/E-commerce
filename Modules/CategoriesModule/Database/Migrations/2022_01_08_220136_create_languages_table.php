<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('languages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('abbr', 10);
			$table->string('local', 20)->nullable();
			$table->string('name', 100);
			$table->enum('direction', array('ltr', 'rtl'));
			$table->tinyInteger('active')->default('1');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('languages');
	}
}
