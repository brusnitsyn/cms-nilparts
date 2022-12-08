<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('inn');
            $table->string('ogrn')->nullable();
            $table->string('desc')->nullable();
            $table->string('kpp');
            $table->integer('percent')->nullable()->default(5);
            $table->string('email')->nullable();
            $table->string('call')->nullable();
            $table->string('bank_bik')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ks')->nullable();
            $table->string('bank_rs')->nullable();
            $table->foreignId('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('type_id')->references('id')->on('org_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orgs');
    }
};
