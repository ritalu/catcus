<?php
 
class PetTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('pets')->delete();
 
        Pet::create(array(
            'typeID' => 'cactus',
            'username' => 'ritalu',
            'name' => 'Pedro',
            'happiness' => '60',
            'fullness' => '60',
            'cleanliness' => '60',
            'exp' => '0'
        ));

        Pet::create(array(
            'typeID' => 'cactus',
            'username' => 'ritalu',
            'name' => 'Roberto',
            'happiness' => '60',
            'fullness' => '60',
            'cleanliness' => '60',
            'exp' => '0'
        ));

        Pet::create(array(
            'typeID' => 'cactus',
            'username' => 'ritalu',
            'name' => 'Julio',
            'happiness' => '60',
            'fullness' => '60',
            'cleanliness' => '60',
            'exp' => '0'
        ));
    }
}