<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_assistances', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable(); // gambar opsional
            $table->string('name');                  // nama bantuan
            $table->enum('category', ['Bahan Pokok', 'Uang Tunai', 'BBM Subsidi', 'Kesehatan']);
            $table->string('amount'); // nominal bantuan (opsional, misal sembako ga ada nilai uang)
            $table->string('giver_name');           // nama pemberi
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->enum('availability', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_assistances');
    }
};
