<?php

class UserSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('users')->truncate();
		User::create([
				'email' => 'admin@mail.com',
				'password' => Hash::make('admin'),
				'activated' => 1,
				'first_name' => 'Admin',
				'last_name' => 'Utama'
			]);

		User::create([
				'email' => 'pns1@mail.com',
				'password' => Hash::make('pns1'),
				'activated' => 1,
				'first_name' => 'Admin',
				'last_name' => 'Utama'
			]);

		User::create([
				'email' => 'pns2@mail.com',
				'password' => Hash::make('pns2'),
				'activated' => 1,
				'first_name' => 'Admin',
				'last_name' => 'Utama'
			]);

		User::create([
				'email' => 'pns3@mail.com',
				'password' => Hash::make('pns3'),
				'activated' => 1,
				'first_name' => 'Admin',
				'last_name' => 'Utama'
			]);

		User::create([
				'email' => 'pns4@mail.com',
				'password' => Hash::make('pns4'),
				'activated' => 1,
				'first_name' => 'Admin',
				'last_name' => 'Utama'
			]);
	}


}