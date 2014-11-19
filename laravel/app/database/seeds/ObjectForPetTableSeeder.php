<?php
 
class ObjectForPetTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('objectforpet')->delete();
 
        ObjectForPet::create(array(
            'objectID' => '1',
            'typeID' => 'cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '2',
            'typeID' => 'cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '3',
            'typeID' => 'fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '4',
            'typeID' => 'fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '5',
            'typeID' => 'turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '6',
            'typeID' => 'turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'cactus'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'fish'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'turtle'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '7',
            'typeID' => 'dog'
        ));

        ObjectForPet::create(array(
            'objectID' => '8',
            'typeID' => 'cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '9',
            'typeID' => 'cat'
        ));

        ObjectForPet::create(array(
            'objectID' => '10',
            'typeID' => 'dog'
        ));

        ObjectForPet::create(array(
            'objectID' => '11',
            'typeID' => 'dog'
        ));
    }
}