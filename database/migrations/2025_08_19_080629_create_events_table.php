<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('name');
            // samakan dengan value dari form: pakai lowercase 'open'/'closed' (atau ubah form-nya)
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->time('start_time')->nullable();
            $table->integer('partisipasi')->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('duration_days')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
