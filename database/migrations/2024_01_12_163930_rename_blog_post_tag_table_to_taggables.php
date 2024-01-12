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
        Schema::table('blog_post_tag', function (Blueprint $table) {
            $table->dropForeign(['blog_post_id']);
            $table->dropColumn('blog_post_id');
        });

        Schema::rename('blog_post_tag', 'taggables');

        Schema::table('taggables', function (Blueprint $table) {
            $table->nullableMorphs('taggable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropMorphs('taggable');
        });

        Schema::rename('taggables', 'blog_post_tag');

        Schema::disableForeignKeyConstraints();

        Schema::table('blog_post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_post_id')->index();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }
};
