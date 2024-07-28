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
        Schema::create('rams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('family_id')->nullable()->constrained('families', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('memory_type_id')->nullable()->constrained('memory_types', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('model_name');
            $table->dateTime('release_date')->nullable();
            $table->integer('size')->nullable();
            $table->integer('mt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rams');
    }
};
