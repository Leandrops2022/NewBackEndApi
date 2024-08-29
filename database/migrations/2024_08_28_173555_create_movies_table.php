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
        Schema::create('movies', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('imdb_id')->nullable();
            $table->boolean('adult');
            $table->foreignId('genre_1')->nullable()->constrained('genres');
            $table->foreignId('genre_2')->nullable()->constrained('genres');
            $table->foreignId('genre_3')->nullable()->constrained('genres');
            $table->string('backdrop_path')->nullable();
            $table->string('homepage')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('original_title')->nullable();
            $table->string('original_language')->nullable();
            $table->string('overview')->nullable();
            $table->string('poster_path')->nullable();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->nullable();
            $table->integer('runtime')->nullable();
            $table->double('budget')->nullable();
            $table->double('popularity')->nullable();
            $table->double('revenue')->nullable();
            $table->date('release_date')->nullable();
            $table->double('vote_average')->nullable();
            $table->integer('vote_count')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
