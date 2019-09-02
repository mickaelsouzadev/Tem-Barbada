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
			'fantasy_name' => 'Taxi Carrara ou Carrara Taxi',
            'email' => 'agostinho@carrataxioutaxicarrara.com',
            'password' => bcrypt('carrara123'),
            'neighborhood' => 'Bairro da pastelaria do beiçola',
            'street' => 'Rua onde mora o Lineu',
            'number' => 2345,
            'phone_1' => '(00) 9999-9999',
            'phone_2' => '(00) 9999-9999',
            'state' => 19,
            'city' => 3658,
            'categories_id' => 2,
        ]);
    }
}
