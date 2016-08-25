<?php

use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bids', function($table)
		{
			$table->increments('id');
			$table->text('description');
			$table->smallinteger('status');
			$table->enum('active', array('Y', 'N'));
			$table->decimal('budget', 5, 2);
			$table->date('startdate');
			$table->date('enddate');
			$table->integer('user_id');
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
		Schema::drop('bids');
	}

}
