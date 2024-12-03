<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->enum('language', ['ar', 'ar_en'])->default('ar');
            $table->string('status')->nullable();
            $table->text('title_ar')->nullable();
            $table->text('title_en')->nullable();
            $table->string('link');
            $table->string('photo')->nullable();
            $table->string('duration')->nullable();
            $table->string('added_date')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
