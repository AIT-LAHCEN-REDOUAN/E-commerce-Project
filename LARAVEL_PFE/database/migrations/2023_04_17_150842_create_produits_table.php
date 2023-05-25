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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('prix');
            $table->string('description',800);
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('marque_id');
            $table->foreign('categorie_id')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('type_id')->on('types')->references('id')->onDelete('cascade');
            $table->foreign('marque_id')->on('marques')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
