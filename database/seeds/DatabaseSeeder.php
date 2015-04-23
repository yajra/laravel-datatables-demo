<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$faker = Faker\Factory::create();
		$users = [];
		for ($i=0; $i < 500; $i++) {
			$user = new User;
			$user->name = $faker->name;
			$user->email = $faker->email;
			$user->password = Hash::make('secret');
			$user->save();
		}

	}

}
