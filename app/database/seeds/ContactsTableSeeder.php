<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contacts')->truncate();
		
		$faker = Faker::create();

		Contact::create([
			'firstName' => 'Eric',
			'lastName'  => 'Jones',
			'birthday'  => date('Y-m-d'),
            'photo'     => 'eric_jones250.jpg'
		]);

		foreach(range(1, 99) as $index)
		{
			$n = $faker->numberBetween(1, 59);
            Contact::create([
				'firstName' => $faker->firstName,
				'lastName'  => $faker->lastName,
				'birthday'  => $faker->date,
                'photo'     => "pic{$n}.jpg",
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