<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // giả lập tài khoản admin
        \DB::table('admins')->insert([
            'name'      => 'TuanPham',
            'email'     => 'bicudu0403@gmail.com',
            'phone'     => '0932505372',
            'password'  => Hash::make('04031998'),
        ]);
    }
}
