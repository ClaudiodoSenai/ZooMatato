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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->integer('idade')->nullable(false);
            $table->string('especie')->nullable(false);
            $table->string('ra')->nullable(false)->unique(); 
            $table->decimal('peso', 8, 2)->nullable(false); 
            $table->decimal('altura', 5, 2)->nullable(false); 
            $table->string('sexo')->nullable(false);
            $table->string('dieta')->nullable(false);
            $table->string('habitat')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
