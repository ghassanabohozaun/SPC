<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->enum('language', ['ar', 'ar_en'])->default('ar');
            $table->longText('opinion_ar')->nullable();
            $table->longText('opinion_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('age')->nullable();
            $table->string('country')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('job_title_ar')->nullable();
            $table->string('job_title_en')->nullable();
            $table->integer('rating')->default('0');
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
        Schema::dropIfExists('testimonials');
    }
}
