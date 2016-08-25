<?php

use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->enum('isjob', array('Y', 'N'));
			$table->enum('isescrow', array('Y', 'N'));
			$table->enum('isoffered', array('Y', 'N'));
			$table->smallinteger('status');
			$table->enum('active', array('Y', 'N'));
			$table->decimal('budget', 5, 2);
			$table->date('startdate');
			$table->date('enddate');
			$table->smallinteger('rating');
			$table->enum('iscontract', array('Y', 'N'));
			$table->integer('user_id');
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
		Schema::drop('jobs');
	}

}
