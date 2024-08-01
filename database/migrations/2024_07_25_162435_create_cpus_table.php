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
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('architecture_id')->nullable()->constrained('architectures', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('family_id')->nullable()->constrained('families', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('cpu_socket_id')->nullable()->constrained('cpu_sockets', 'id')->cascadeOnUpdate()->restrictOnDelete();

            $table->string('model_name');
            $table->dateTime('release_date')->nullable();
            $table->integer('cores')->nullable();
            
            $table->integer('e_cores')->nullable();
            $table->integer('p_cores')->nullable();
            $table->integer('threads')->nullable();
            $table->integer('base_clock')->nullable();
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
        Schema::dropIfExists('cpus');
    }
};
