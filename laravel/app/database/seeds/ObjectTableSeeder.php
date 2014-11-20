<?php
 
class ObjectTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('objects')->delete();
 
        Object::create(array(
            'name' => 'Water',
            'need_fulfilled' => 'Fullness',
            'rate_of_fulfillment' => '2',
            'price' => '50',
            'uses_available' => '10',
            'unlock_level' => '1',
            'image' => 'http://catcus.me/img/water.png'
        ));

        Object::create(array(
            'name' => 'Sombrero',
            'need_fulfilled' => 'Happiness',
            'rate_of_fulfillment' => '2',
            'price' => '100',
            'uses_available' => '-1',
            'unlock_level' => '1',
            'image' => 'http://catcus.me/img/sombrero.png'
        ));

        Object::create(array(
            'name' => 'Fish Food',
            'need_fulfilled' => 'Fullness',
            'rate_of_fulfillment' => '4',
            'price' => '100',
            'uses_available' => '10',
            'unlock_level' => '2',
            'image' => 'http://catcus.me/img/fish_food.png'
        ));

        Object::create(array(
            'name' => 'Bowl Decoration',
            'need_fulfilled' => 'Happiness',
            'rate_of_fulfillment' => '4',
            'price' => '200',
            'uses_available' => '-1',
            'unlock_level' => '2',
            'image' => 'http://catcus.me/img/castle_red.png'
        ));

        Object::create(array(
            'name' => 'Turtle Food',
            'need_fulfilled' => 'Fullness',
            'rate_of_fulfillment' => '8',
            'price' => '150',
            'uses_available' => '10',
            'unlock_level' => '3',
            'image' => 'http://catcus.me/img/turtle_food.png'
        ));

        Object::create(array(
            'name' => 'Ducky Toy',
            'need_fulfilled' => 'Happiness',
            'rate_of_fulfillment' => '8',
            'price' => '250',
            'uses_available' => '-1',
            'unlock_level' => '3',
            'image' => 'http://catcus.me/img/duck.png'
        ));

        Object::create(array(
            'name' => 'Comb',
            'need_fulfilled' => 'Cleanliness',
            'rate_of_fulfillment' => '5',
            'price' => '500',
            'uses_available' => '-1',
            'unlock_level' => '0',
            'image' => 'http://catcus.me/img/comb.png'
        ));

        Object::create(array(
            'name' => 'Cat Food',
            'need_fulfilled' => 'Fullness',
            'rate_of_fulfillment' => '12',
            'price' => '250',
            'uses_available' => '10',
            'unlock_level' => '4',
            'image' => 'http://catcus.me/img/cat_food.png'
        ));

        Object::create(array(
            'name' => 'Yarn',
            'need_fulfilled' => 'Happiness',
            'rate_of_fulfillment' => '10',
            'price' => '500',
            'uses_available' => '-1',
            'unlock_level' => '4',
            'image' => 'http://catcus.me/img/yarn.png'
        ));

        Object::create(array(
            'name' => 'Dog Food',
            'need_fulfilled' => 'Fullness',
            'rate_of_fulfillment' => '25',
            'price' => '250',
            'uses_available' => '10',
            'unlock_level' => '5',
            'image' => 'http://catcus.me/img/dog_food.png'
        ));

        Object::create(array(
            'name' => 'Bone',
            'need_fulfilled' => 'Happiness',
            'rate_of_fulfillment' => '25',
            'price' => '500',
            'uses_available' => '10',
            'unlock_level' => '5',
            'image' => 'http://catcus.me/img/bone.png'
        ));
    }
}