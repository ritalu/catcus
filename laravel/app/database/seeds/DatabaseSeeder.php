<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		// $this->call('ImageTableSeeder');
		// $this->call('PetTypeTableSeeder');
		// $this->call('PetTableSeeder');
		// $this->call('ObjectTableSeeder');
		// $this->call('ObjectForPetTableSeeder');
		// $this->call('ObjectsOwnedTableSeeder');
	}

}
