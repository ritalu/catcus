<?php
 
class ImageTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('images')->delete();
 
        Image::create(array(
            'imageID' => 'default_cactus',
            'happy' => 'http://tinyurl.com/nwrw45v',
            'sad' => 'http://tinyurl.com/nwrw45v',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));
 
        Image::create(array(
            'imageID' => 'default_fish',
            'happy' => 'http://tinyurl.com/nwrw45v',
            'sad' => 'http://tinyurl.com/nwrw45v',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_turtle',
            'happy' => 'http://tinyurl.com/nwrw45v',
            'sad' => 'http://tinyurl.com/nwrw45v',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_cat',
            'happy' => 'http://tinyurl.com/nwrw45v',
            'sad' => 'http://tinyurl.com/nwrw45v',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));

        Image::create(array(
            'imageID' => 'default_dog',
            'happy' => 'http://tinyurl.com/nwrw45v',
            'sad' => 'http://tinyurl.com/nwrw45v',
            'dead' => 'http://tinyurl.com/nwrw45v'
        ));
    }
}