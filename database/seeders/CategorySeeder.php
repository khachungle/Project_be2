<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['TenDanhMuc' => 'Rau', 'created_at' => now(), 'updated_at' => now()],
            ['TenDanhMuc' => 'Củ', 'created_at' => now(), 'updated_at' => now()],
            ['TenDanhMuc' => 'Quả', 'created_at' => now(), 'updated_at' => now()],
            ['TenDanhMuc' => 'Đồ tươi', 'created_at' => now(), 'updated_at' => now()],
            ['TenDanhMuc' => 'Đồ uống', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
