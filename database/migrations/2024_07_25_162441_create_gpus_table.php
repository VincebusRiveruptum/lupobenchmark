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
        Schema::create('gpus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('architecture_id')->nullable()->constrained('architectures', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('family_id')->nullable()->constrained('families', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('memory_type_id')->nullable()->constrained('memory_types', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('bus_type_id')->nullable()->constrained('bus_types', 'id')->cascadeOnUpdate()->restrictOnDelete();

            $table->string('model_name');
            $table->dateTime('release_date')->nullable();
            $table->integer('memory_size')->nullable();
            $table->integer('shaders')->nullable();
            $table->integer('rop_tmu')->nullable();
            $table->integer('bus_width')->nullable();
            $table->integer('gpu_clock')->nullable();
            $table->integer('memory_clock')->nullable();
            $table->integer('tdp')->nullable();
            $table->string('source')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gpus');
    }
};
