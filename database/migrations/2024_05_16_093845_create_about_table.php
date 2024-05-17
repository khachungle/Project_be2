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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('TieuDe'); // Tiêu đề
            $table->text('NoiDung'); // Nội dung
            $table->string('MucTieu1'); // Tiêu chí 1
            $table->string('MucTieu2'); // Tiêu chí 2
            $table->string('MucTieu3'); // Tiêu chí 3
            $table->string('AnhMoTa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
