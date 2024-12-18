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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title_en_slug')->nullable();
            $table->string('title_ar_slug')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('abstract_en')->nullable();
            $table->string('abstract_ar')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->string('file')->nullable();
            $table->enum('language', ['en', 'ar_en'])->default('en');
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
        Schema::dropIfExists('books');
    }
};
