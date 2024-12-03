<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_texts', function (Blueprint $table) {
            $table->id();
            $table->text('project_details_ar')->nullable();
            $table->text('project_details_en')->nullable();
            $table->text('about_association_title_ar')->nullable();
            $table->text('about_association_title_en')->nullable();
            $table->text('about_association_details_ar')->nullable();
            $table->text('about_association_details_en')->nullable();
            $table->string('about_association_founders_count')->nullable();
            $table->string('about_association_beneficiaries_count')->nullable();


            $table->text('founders_title_ar')->nullable();
            $table->text('founders_title_en')->nullable();
            $table->text('blog_title_ar')->nullable();
            $table->text('blog_title_en')->nullable();
            $table->text('testimonials_title_ar')->nullable();
            $table->text('testimonials_title_en')->nullable();
            $table->text('testimonials_details_ar')->nullable();
            $table->text('testimonials_details_en')->nullable();


            $table->string('counter_icon_1')->nullable();
            $table->string('counter_number_1')->nullable();
            $table->string('counter_name_1_ar')->nullable();
            $table->string('counter_name_1_en')->nullable();

            $table->string('counter_icon_2')->nullable();
            $table->string('counter_number_2')->nullable();
            $table->string('counter_name_2_ar')->nullable();
            $table->string('counter_name_2_en')->nullable();

            $table->string('counter_icon_3')->nullable();
            $table->string('counter_number_3')->nullable();
            $table->string('counter_name_3_ar')->nullable();
            $table->string('counter_name_3_en')->nullable();

            $table->string('counter_icon_4')->nullable();
            $table->string('counter_number_4')->nullable();
            $table->string('counter_name_4_ar')->nullable();
            $table->string('counter_name_4_en')->nullable();

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
        Schema::dropIfExists('fixed_texts');
    }
}
