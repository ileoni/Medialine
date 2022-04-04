<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            'insert into address (id, state, city, street, number, user_id) values (?, ?, ?, ?, ?, ?)', 
            [1, 'Rio Grande do Sul', 'Porto Alegre', 'Diogo Álvares Correia', '476', 1]
        );
    }
}
