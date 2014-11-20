<?php
 
class ObjectForPetTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('objectforpet')->delete();
 
        ObjectForPet::create(array(
            'objectID' => '1',
            'typeID' => 'Cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '2',
            'typeID' => 'Cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '3',
            'typeID' => 'Fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '4',
            'typeID' => 'Fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '5',
            'typeID' => 'Turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '6',
            'typeID' => 'Turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'Cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'Fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'Turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'Cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'Dog'
        ));

        ObjectForPet::create(array(
            'objectID' => '8',
            'typeID' => 'Cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '9',
            'typeID' => 'Cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '10',
            'typeID' => 'Dog'
        ));

        ObjectForPet::create(array(
            'objectID' => '11',
            'typeID' => 'Dog'
        ));
    }
}