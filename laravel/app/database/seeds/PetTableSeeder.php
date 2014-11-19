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
            'exp' => '0',
            'creationdate' => new DateTime()
        ));

        Pet::create(array(
            'typeID' => 'cactus',
            'username' => 'shanna',
            'name' => 'Roberto',
            'happiness' => '60',
            'fullness' => '60',
            'cleanliness' => '60',
            'exp' => '0',
            'creationdate' => new DateTime()
        ));

        Pet::create(array(
            'typeID' => 'cactus',
            'username' => 'lei',
            'name' => 'Julio',
            'happiness' => '60',
            'fullness' => '60',
            'cleanliness' => '60',
            'exp' => '0',
            'creationdate' => new DateTime()
        ));
    }
}