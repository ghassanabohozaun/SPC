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
        Schema::create('my_news', function (Blueprint $table) {
            $table->id();
            $table->string('title_en_slug')->nullable();
            $table->string('title_ar_slug')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->string('added_date')->nullable();
            $table->string('status')->nullable();
            $table->enum('language', ['en', 'ar_en'])->default('en');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('my_news');
    }
};
