<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'ritalu',
            'password' => 'password',
            'email' => 'rita.lu@mail.mcgill.ca',
            'exp' => '0',
            'money' => '2000'
        ));
 
        User::create(array(
            'username' => 'shanna',
            'password' => 'password',
            'email' => 'shanna.wang@mail.mcgill.ca',
            'exp' => '0',
            'money' => '2000'
        ));

        User::create(array(
            'username' => 'lei',
            'password' => 'password',
            'email' => 'lei.lopez@mail.mcgill.ca',
            'exp' => '0',
            'money' => '2000'
        ));
    }
 
}