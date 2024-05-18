<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = ['Rau', 'Củ', 'Quả', 'Đồ tươi', 'Đồ uống'];
        $products = [];
        $images = ['product-1.jpg', 'product-2.jpg', 'product-3.jpg', 'product-4.jpg', 'product-5.jpg', 'product-6.jpg', 'product-7.jpg', 'product-8.jpg'];

        for ($i = 1; $i <= 40; $i++) {
            $products[] = [
                'TenSp' => 'Sản phẩm ' . $i,
                'MoTa' => 'Mô tả cho sản phẩm ' . $i,
                'Gia' => rand(1000, 100000) / 100,
                'LoaiDanhMuc' => $categories[array_rand($categories)],
                'AnhMoTa' => 'img/' . $images[array_rand($images)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
