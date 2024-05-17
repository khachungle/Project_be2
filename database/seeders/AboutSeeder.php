<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('about')->insert([
            'TieuDe' => 'Giới thiệu về FOODY',
            'NoiDung' => 'Nông Sản Xanh là một đội ngũ đam mê và nhiệt huyết với sứ mệnh mang đến những sản phẩm nông sản tươi sạch, an toàn và chất lượng cho mọi gia đình. Chúng tôi tận tâm và không ngừng nỗ lực để cung cấp những sản phẩm nông sản tươi ngon nhất từ trang trại đến bàn ăn của bạn.',
            'MucTieu1' => 'Cung cấp sản phẩm nông sản chất lượng cao và an toàn',
            'MucTieu2' => 'Đảm bảo sự hài lòng và sức khỏe của khách hàng',
            'MucTieu3' => 'Góp phần bảo vệ môi trường và phát triển nông nghiệp bền vững',
            'AnhMoTa' => 'img/about.jpg', // Thay đổi thành đường dẫn thực tế của ảnh
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
