<?php

use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('category_id');
			$table->enum('active', array('Y', 'N'));
			$table->enum('isdefault', array('Y', 'N'));
			$table->enum('iscompany', array('Y', 'N'));
			$table->string('name');
			$table->text('description');
			$table->string('skype');
			$table->string('twitter');
			$table->string('facebook');
			$table->string('gplus');
			$table->string('email');
			$table->string('phone1');
			$table->string('phone2');
			$table->string('city');
			$table->string('street');
			$table->integer('country_id');
			$table->string('postadd');
			$table->string('postcode');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
