<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class OderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Order::create([
                'customer_name' => $f->name(),
                'customer_address' => $f->city(),
                'customer_phone' => $f->numerify('0#########'),
                'customer_email' => $f->email(),
                'total_amount' => $f->numerify('######'),
                'updated_at' => $f->date('Y-m-d'),
                'created_at' => $f->date('Y-m-d'),
            ]);
        }
    }
}
