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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedSmallInteger('rating');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('city_id', 'city_id_idx');
            $table->index('user_id', 'user_id_idx');
            $table->foreign('city_id', 'city_id_fk')->references('id')->on('cities');
            $table->foreign('user_id', 'user_id_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
