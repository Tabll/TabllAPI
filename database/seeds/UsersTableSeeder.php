<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * 用户表
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => '魏天述',
                'email' => 'tabll@outlook.com',
                'email_verified_at' => null,
                'password' => '$10$67SlcYBCDBwM45X70DT94eosjUSrjWz0mA.myxsh1/l4chq1V1/e6',
                'remember_token' => null,
                'created_at' => '2020-1-1 00:00:00',
                'updated_at' => '2020-1-1 00:00:00',
            ]
        ]);
    }
}
