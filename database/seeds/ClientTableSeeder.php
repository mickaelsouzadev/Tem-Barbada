<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
			'fantasy_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('12345'),
            'neighborhood' => Str::random(20),
            'street' => Str::random(20),
            'number' => 2345,
            'phone_1' => '(00) 9999-9999',
            'phone_2' => '(00) 9999-9999',
            'state' => 1,
            'city' => 2,
            'categories_id' => 1,
        ]);
    }
}
