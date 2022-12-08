<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTables extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->string('title');
            $table->string('slug')->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->string('article')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('machines')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->decimal('price', 18)->nullable();
            $table->boolean('in_stock')->default(true);
            // $table->foreignId('brand_id')->references('id')->on('product_brands')->onDelete('cascade');
            // $table->foreignId('unit_id')->references('id')->on('units');
            $table->foreignId('pub_user_id')->nullable()->references('id')->on('users');
            // $table->foreignId('pub_org_id')->references('id')->on('orgs');
            $table->foreignId('category_id')->nullable()->references('id')->on('product_categories');
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('product_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'product');
        });

        Schema::create('product_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'product');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_revisions');
        Schema::dropIfExists('product_slugs');
        Schema::dropIfExists('products');
    }
}
