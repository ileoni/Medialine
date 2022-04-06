<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            'insert into products (id, name, description, price, amount) values (?, ?, ?, ?, ?)',
            [1, 'Caneca', 'Caneca legal ...', 30.00, 20]
        );
    }
}
