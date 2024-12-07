<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->integer('order')->nullable();
            $table->enum('details_status', ['show', 'hide'])->default('hide');
            $table->enum('button_status', ['show', 'hide'])->default('hide');
            $table->string('url_ar')->nullable();
            $table->string('url_en')->nullable();
            $table->string('photo')->nullable();
            $table->enum('language',['ar','ar_en'])->default('ar');
            $table->string('status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
