<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username'=>'darby_biehl',
            'email'=>'tembarbada@tembarbada.com.br',
            'password'=>Hash::make('d4rbyb13hl')
        ]);
    }
}
