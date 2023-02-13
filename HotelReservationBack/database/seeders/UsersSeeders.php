<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "id" => 1,
                "age" => 18,
                "phone" => "625812716",
                "name" => "Alex",
                "surname" => "Lopez",
                "email" => "coquixo98@gmail.com",
                "password" => "Alex1234",


            ],
            [
                "id" => 2,
                "age" => 18,
                "phone" => "625812716",
                "name" => "Marcelo",
                "surname" => "Quiroga",
                "email" => "coquixo100@gmail.com",
                "password" => "Alex1234",


            ],
            [
                "id" => 3,
                "age" => 18,
                "phone" => "625812716",
                "name" => "Joy",
                "surname" => "Portilla",
                "email" => "joytps@gmail.com",
                "password" => "Joy1234",


            ],
        ]);
    }
}
