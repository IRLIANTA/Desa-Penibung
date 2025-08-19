<?php

// database/migrations/2025_08_19_000000_create_events_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable(); // file upload
            $table->string('name');
            $table->enum('status', ['Open', 'Closed'])->default('Open');
            $table->time('start_time')->nullable();
            $table->date('date')->nullable();
            $table->integer('duration_days')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
