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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            if (env('DB_CONNECTION') === 'sqlite_testing') {
                $table->text('content')->nullable();
            } else {
                $table->text('content');
            }
            $table->unsignedBigInteger('blog_post_id')->index()->nullable();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
