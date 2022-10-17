<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=3;$i++){
            Db::table('payments')->insert([
                'uuid' => Str::uuid(),
                'payment_date' => '2019-02-01',
                'expires_at' => '2019-03-01',
                'status' => 'paid',
                'client_id' => $i,
                'clp_usd' => '810',
                'created_at' => '2022-02-01'
            ]);
            Db::table('payments')->insert([
                'uuid' => Str::uuid(),
                'payment_date' => '2020-02-01',
                'expires_at' => '2020-03-01',
                'status' => 'paid',
                'client_id' => $i,
                'clp_usd' => '815',
                'created_at' => '2020-02-01'
            ]);
            Db::table('payments')->insert([
                'uuid' => Str::uuid(),
                'payment_date' => '2021-02-01',
                'expires_at' => '2021-03-01',
                'status' => 'paid',
                'client_id' => $i,
                'clp_usd' => '820',
                'created_at' => '2021-02-01'
            ]);
            Db::table('payments')->insert([
                'uuid' => Str::uuid(),
                'payment_date' => '2022-02-01',
                'expires_at' => '2022-03-01',
                'status' => 'paid',
                'client_id' => $i,
                'clp_usd' => '820',
                'created_at' => '2022-02-01'
            ]);

        }
    }
}
