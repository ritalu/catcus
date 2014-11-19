<?php
 
class ObjectsOwnedTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('objectsowned')->delete();
 
        ObjectsOwned::create(array(
            'objectID' => '7',
            'username' => 'ritalu',
            'uses_remaining' => '-1'
        ));

        ObjectsOwned::create(array(
            'objectID' => '1',
            'username' => 'ritalu',
            'uses_remaining' => '10'
        ));

        ObjectsOwned::create(array(
            'objectID' => '2',
            'username' => 'ritalu',
            'uses_remaining' => '10'
        ));

    }
}