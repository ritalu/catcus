<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'ritalu',
            'password' => 'rcuuyqtf',
            'email' => 'rita.lu@mail.mcgill.ca',
            'exp' => '2',
            'money' => '2000',
            'picture' => 'http://cdn.flaticon.com/png/256/28314.png'
        ));
 
        User::create(array(
            'username' => 'shanna',
            'password' => 'rcuuyqtf',
            'email' => 'shanna.wang@mail.mcgill.ca',
            'exp' => '2',
            'money' => '2000',
            'picture' => 'http://cdn.flaticon.com/png/256/28314.png'
        ));

        User::create(array(
            'username' => 'lei',
            'password' => 'rcuuyqtf',
            'email' => 'lei.lopez@mail.mcgill.ca',
            'exp' => '2',
            'money' => '2000',
            'picture' => 'http://cdn.flaticon.com/png/256/28314.png'
        ));
    }
 
}