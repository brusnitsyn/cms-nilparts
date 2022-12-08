<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTables extends Migration
{
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->string('title');
            $table->integer('position')->unsigned()->nullable();
            $table->foreignId('category_parent_id')->nullable()->references('id')->on('product_categories')->constrained();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('product_category_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'product_category');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('product_category_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'product_category');
        });

        Schema::create('product_category_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'product_category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_category_revisions');
        Schema::dropIfExists('product_category_translations');
        Schema::dropIfExists('product_category_slugs');
        Schema::dropIfExists('product_categories');
    }
}
