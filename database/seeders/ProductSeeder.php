<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f = Faker::create();
      
       for ($i = 0; $i < 10; $i++){
        Product::create([
            'TenSp' => $f->name(),
            'MoTa' => $f->sentence('20',true),
            'Gia' => $f->numerify('####'),
            'LoaiDanhMuc' => $f->randomElement(['Rau','Củ','Đồ tươi','Khác']),
            'AnhMoTa' => $f->image(),
            
        ]);
       }


    }
}
