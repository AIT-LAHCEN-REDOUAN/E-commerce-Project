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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->string('user_email');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantity')->default(0);
            $table->float('total')->default(0);
            $table->foreign('user_email')->on('users')->references('email')->onDelete('cascade');
            $table->foreign('produit_id')->on('produits')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
