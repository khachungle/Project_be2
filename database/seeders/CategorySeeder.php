<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $f = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                "TenDanhMuc" => $f->randomElement(['Rau','Củ','Quả','Đồ tươi','Đồ uống'])
            ]);
        }
    }
}
