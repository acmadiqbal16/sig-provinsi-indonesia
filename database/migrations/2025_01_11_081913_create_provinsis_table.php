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
        Schema::create('provinsi', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id yang otomatis auto increment
            $table->string('name',30); // Menambahkan kolom name
            $table->string('kota',30); // Menambahkan kolom kota
            $table->decimal('latitude', 10, 6); // Menambahkan kolom latitude dengan tipe decimal
            $table->decimal('longitude', 10, 6); // Menambahkan kolom longitude dengan tipe decimal
            $table->decimal('luas_wilayah', 15, 2); // Menambahkan kolom luas_wilayah dengan tipe decimal
            $table->integer('populasi'); // Menambahkan kolom populasi dengan tipe integer
            $table->decimal('kepadatan', 10, 2); // Menambahkan kolom kepadatan dengan tipe decimal
            $table->integer('jumlah_suku'); // Menambahkan kolom jumlah_suku dengan tipe integer
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinsis');
    }
};
