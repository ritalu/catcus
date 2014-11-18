<?php
 
class ObjectTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('objects')->delete();
 
        Object::create(array(
            'name' => 'Water',
            'need_fulfilled' => 'fullness',
            'rate_of_fulfillment' => '2',
            'price' => '50',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Sombrero',
            'need_fulfilled' => 'happiness',
            'rate_of_fulfillment' => '2',
            'price' => '100',
            'uses_available' => '-1',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Fish Food',
            'need_fulfilled' => 'fullness',
            'rate_of_fulfillment' => '4',
            'price' => '100',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Bowl Decoration',
            'need_fulfilled' => 'happiness',
            'rate_of_fulfillment' => '4',
            'price' => '200',
            'uses_available' => '-1',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Turtle Food',
            'need_fulfilled' => 'fullness',
            'rate_of_fulfillment' => '8',
            'price' => '150',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Ducky Toy',
            'need_fulfilled' => 'happiness',
            'rate_of_fulfillment' => '8',
            'price' => '250',
            'uses_available' => '-1',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Comb',
            'need_fulfilled' => 'cleanliness',
            'rate_of_fulfillment' => '5',
            'price' => '500',
            'uses_available' => '-1',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Cat Food',
            'need_fulfilled' => 'fullness',
            'rate_of_fulfillment' => '12',
            'price' => '250',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Yarn',
            'need_fulfilled' => 'happiness',
            'rate_of_fulfillment' => '10',
            'price' => '500',
            'uses_available' => '-1',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Dog Food',
            'need_fulfilled' => 'fullness',
            'rate_of_fulfillment' => '25',
            'price' => '250',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));

        Object::create(array(
            'name' => 'Bone',
            'need_fulfilled' => 'happiness',
            'rate_of_fulfillment' => '25',
            'price' => '500',
            'uses_available' => '10',
            'image' => 'http://tinyurl.com/k5x5m9t'
        ));
    }
}