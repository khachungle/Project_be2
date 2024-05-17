<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); //mã giảm giá
            $table->integer('min_total_amount'); //số tiền ít nhất để sử dụng
            $table->integer('max_usage')->nullable(); //số lần dử dụng tối đa
            $table->integer('usage_count')->default(0); //đếm số lần sử dụng
            $table->timestamp('expires_at')->nullable(); //ngày hết hạn
            $table->timestamps();
        });

        //thêm dữ liệu mặc đinh
        DB::table('vouchers')->insert([
            'code' => 'ABC123',
            'min_total_amount' => 50000,
            'max_usage' => 10,
            'usage_count' => 3,
            'expires_at' => '2024-12-31 23:59:59',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
