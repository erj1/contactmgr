<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			// PK
			$table->increments('id');

			// Contact First Name
			$table->string('firstName');

			// Contact Last Name
			$table->string('lastName')->nullable();

			// Contact Photo
			$table->string('photo')->nullable();

			// Contact Birthday
			$table->date('birthday')->nullable();

			// Contact Email
			$table->string('email')->nullable();

			// Contact Phone
			$table->string('phone')->nullable();

			// Street Address 1
			$table->string('street1')->nullable();
			
			// Street Address 2
			$table->string('street2')->nullable();
			
			// City
			$table->string('city')->nullable();
			
			// State
			$table->string('state')->nullable();
			
			// Zip / Postal Code
			$table->string('zip')->nullable();
			
			// Created At / Updated At
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
		Schema::drop('contacts');
	}

}
