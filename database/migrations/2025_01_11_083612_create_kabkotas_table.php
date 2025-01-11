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
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id yang otomatis auto increment
            $table->string('name',30); // Menambahkan kolom name
            $table->string('kota',30); // Menambahkan kolom kota
            $table->decimal('latitude', 10, 6); // Menambahkan kolom latitude dengan tipe decimal
            $table->decimal('longitude', 10, 6);
            $table->foreignId('provinsi_id')->constrained('provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabkotas');
    }
};
