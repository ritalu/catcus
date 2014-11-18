<?php
 
class PetTypeTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('pettypes')->delete();
 
        PetType::create(array(
            'typeID' => 'cactus',
            'rate_decrease_hap' => '2',
            'rate_decrease_full' => '1',
            'rate_decrease_clean' => '1',
            'unlock_level' => '1',
            'price' => '250',
            'imageID' => 'default_cactus'
        ));

        PetType::create(array(
            'typeID' => 'fish',
            'rate_decrease_hap' => '4',
            'rate_decrease_full' => '4',
            'rate_decrease_clean' => '2',
            'unlock_level' => '2',
            'price' => '500',
            'imageID' => 'default_fish'
        ));

        PetType::create(array(
            'typeID' => 'turtle',
            'rate_decrease_hap' => '8',
            'rate_decrease_full' => '12',
            'rate_decrease_clean' => '3',
            'unlock_level' => '3',
            'price' => '1000',
            'imageID' => 'default_turtle'
        ));

        PetType::create(array(
            'typeID' => 'cat',
            'rate_decrease_hap' => '5',
            'rate_decrease_full' => '12',
            'rate_decrease_clean' => '4',
            'unlock_level' => '4',
            'price' => '2000',
            'imageID' => 'default_cat'
        ));

        PetType::create(array(
            'typeID' => 'dog',
            'rate_decrease_hap' => '10',
            'rate_decrease_full' => '18',
            'rate_decrease_clean' => '10',
            'unlock_level' => '5',
            'price' => '5000',
            'imageID' => 'default_dog'
        ));
    }
}