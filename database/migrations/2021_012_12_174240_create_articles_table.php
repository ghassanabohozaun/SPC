<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('abstract_ar')->nullable();
            $table->longText('abstract_en')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('publisher_name')->nullable();
            $table->enum('language', ['ar', 'ar_en'])->default('ar');
            $table->string('status')->nullable();
            $table->integer('views')->default(1);
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
        Schema::dropIfExists('articles');
    }
}
