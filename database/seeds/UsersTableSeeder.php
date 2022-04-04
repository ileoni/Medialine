<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Igor Leoni Pereira Machado',
                    'email' => 'higorleonii@gmail.com',
                    'password' => '$2a$12$h35TiGl.Ogt.a51nLYWIUOW5FEzQJQP6CbpVrSA6c/18J99l0Ty3q',
                    'type' => 'admin'
                ],[
                    'id' => 2,
                    'name' => 'Mauricio',
                    'email' => 'mau@gmail.com',
                    'password' => '$2a$12$h35TiGl.Ogt.a51nLYWIUOW5FEzQJQP6CbpVrSA6c/18J99l0Ty3q',
                    'type' => 'user'
                ]
            ]
        );
    }
}
