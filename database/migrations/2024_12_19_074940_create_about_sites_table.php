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
        Schema::create('about_sites', function (Blueprint $table) {
            $table->id();

            // whom
            $table->longText('whom_ar')->nullable();
            $table->longText('whom_en')->nullable();
            $table->string('whom_brochure')->nullable();
            $table->longText('contact_us_ar')->nullable();
            $table->longText('contact_us_en')->nullable();

            // who are we are
            $table->longText('who_are_we_ar')->nullable();
            $table->longText('who_are_we_en')->nullable();
            $table->string('who_are_we_profile')->nullable();  //brochure

            // about doctors
            $table->longText('about_doctor_en')->nullable();
            $table->longText('about_doctor_ar')->nullable();

            // why chose us
            $table->string('why_chose_us_title_en')->nullable();
            $table->string('why_chose_us_title_ar')->nullable();
            $table->longText('why_chose_us_details_en')->nullable();
            $table->longText('why_chose_us_details_ar')->nullable();
            $table->string('why_chose_us_photo')->nullable();

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
        Schema::dropIfExists('about_sites');
    }
};