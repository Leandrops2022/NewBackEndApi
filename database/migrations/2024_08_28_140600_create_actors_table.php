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
        Schema::create('actors', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name');
            $table->string('profile_path');
            $table->string('place_of_birth');
            $table->double('popularity');
            $table->string('tmdb_id');
            $table->boolean('adult');
            $table->string('also_known_as');
            $table->string('biography');
            $table->string('birthday');
            $table->string('deathday');
            $table->string('gender');
            $table->string('homepage');
            $table->string('imdb_id');
            $table->string('known_for_department');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
