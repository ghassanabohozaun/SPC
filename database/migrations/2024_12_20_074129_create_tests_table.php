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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->text('test_name_slug')->nullable();
            $table->text('test_name')->nullable();
            $table->longText('test_details')->nullable();
            $table->integer('question_count')->default('0');
            $table->integer('scales_count')->default('0');
            $table->string('added_date')->nullable();
            $table->integer('number_times_of_use')->default('0');
            $table->string('status')->nullable();
            $table->string('file')->nullable();
            $table->string('test_photo')->nullable();
            $table->enum('language', ['en', 'ar'])->default('en');
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
        Schema::dropIfExists('tests');
    }
};
