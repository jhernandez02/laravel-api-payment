<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('clients')->insert([
            'id' => '1',
            'email' => 'client01@example.com',
            'join_date' => '2022-01-01',
            'created_at' => '2022-01-01'
        ]);
        Db::table('clients')->insert([
            'id' => '2',
            'email' => 'client02@example.com',
            'join_date' => '2022-01-01',
            'created_at' => '2022-01-01'
        ]);
        Db::table('clients')->insert([
            'id' => '3',
            'email' => 'client03@example.com',
            'join_date' => '2022-01-01',
            'created_at' => '2022-01-01'
        ]);
    }
}
