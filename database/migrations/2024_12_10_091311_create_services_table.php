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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_en_slug')->nullable();
            $table->string('title_ar_slug')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('summary_ar')->nullable();
            $table->longText('details_en')->nullable();
            $table->longText('details_ar')->nullable();
            // no not treatment area , yes yes it is treatment area
            $table->enum('is_treatment_area', ['no', 'yes'])->default('no');
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->enum('language', ['en', 'ar_en'])->default('en');
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
        Schema::dropIfExists('services');
    }
};
