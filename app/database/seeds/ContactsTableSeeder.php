<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		// clear out the database on subsequent seeding attempts
		$DB::table('contacts')->truncate();
		
		$faker = Faker::create();

		// add a known record
		Contact::create([
			'firstName' => 'Eric',
			'lastName'  => 'Jones',
			'birthday'  => date('Y-m-d'),
			'street1'   => '1 Monument Circle',
			'city'      => 'Indianapolis',
			'state'     => 'IN',
			'zip'       => '46204',
			'email'     => 'eric@example.com',
			'phone'     => '(555) 123-4444'
		]);

		// add 99 random records
		foreach(range(1, 99) as $index)
		{
            Contact::create([
				'firstName' => $faker->firstName,
				'lastName'  => $faker->lastName,
				'birthday'  => $faker->date,
                'street1'    => $faker->streetAddress,
				'street2'    => $faker->secondaryAddress,
				'city'       => $faker->city,
				'state'      => $faker->state,
				'zip'        => $faker->postcode,
				'email'      => $faker->email,
				'phone'      => $faker->phoneNumber
			]);
		}
	}

}