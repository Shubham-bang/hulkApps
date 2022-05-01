<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'HR',
                'email'=>'hr@gmail.com',
                'password'=>Hash::make('123456789'),
                'phone'=>"123456789",
                'role'=>'HR',
                'status'=>'active'
            ),
            array(
                'name'=>'User1',
                'email'=>'user1@gmail.com',
                'password'=>Hash::make('123456789'),
                'phone'=>"123456789",
                'role'=>'user',
                'status'=>'active'
            ),
            array(
                'name'=>'User2',
                'email'=>'user2@gmail.com',
                'password'=>Hash::make('123456789'),
                'phone'=>"123456789",
                'role'=>'user',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
