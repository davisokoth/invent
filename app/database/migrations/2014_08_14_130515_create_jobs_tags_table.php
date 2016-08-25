<?php

use Illuminate\Database\Migrations\Migration;

class CreateJobsTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs_tags', function($table)
		{
			$table->increments('id');
			$table->enum('active', array('Y', 'N'));
			$table->integer('tag_id');
			$table->integer('job_id');
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
		Schema::drop('jobs_tags');
	}

}
