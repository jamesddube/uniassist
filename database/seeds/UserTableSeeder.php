<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->me();
    }

    public function me()
    {
        DB::table('users')->insert([
            'name' => 'James Dube',
            'email' => 'jdube@mbc.co.zw',
            'password' => bcrypt('sead2301'),
        ]);
    }
}
