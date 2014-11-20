<?php
 
class ImageTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('images')->delete();
 
        Image::create(array(
            'imageID' => 'default_cactus',
            'happy' => 'http://catcus.me/img/cactus_happy.png',
            'sad' => 'http://catcus.me/img/cactus_sad.png',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));
 
        Image::create(array(
            'imageID' => 'default_fish',
            'happy' => 'http://catcus.me/img/fish_happy.png',
            'sad' => 'http://catcus.me/img/fish_sad.png',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_turtle',
            'happy' => 'http://catcus.me/img/turtle_happy.png',
            'sad' => 'http://catcus.me/img/turtle_sad.png',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_cat',
            'happy' => 'http://catcus.me/img/cat_happy.png',
            'sad' => 'http://catcus.me/img/cat_sad.png',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_dog',
            'happy' => 'http://catcus.me/img/dog_happy.png',
            'sad' => 'http://catcus.me/img/dog_sad.png',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));
    }
}