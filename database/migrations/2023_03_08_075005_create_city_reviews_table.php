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
        Schema::create('city_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('review_id');

            $table->index('city_id', 'city_id_idx');
            $table->index('review_id', 'review_id_idx');

            $table->foreign('city_id', 'city_reviews_id_fk')->references('id')->on('cities');
            $table->foreign('review_id', 'review_id_fk')->references('id')->on('reviews');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_reviews');
    }
};
