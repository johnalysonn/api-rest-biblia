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
        Schema::create('versiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('capitulo');
            $table->integer('versiculo');
            $table->text('texto');
            $table->unsignedBigInteger('livro_id');
            $table->timestamps();

            $table->foreign('livro_id')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versiculos');
    }
};
