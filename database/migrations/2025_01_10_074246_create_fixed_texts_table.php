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
        Schema::create('fixed_texts', function (Blueprint $table) {
            $table->id();
            $table->string('about_spc_title_en');
            $table->string('about_spc_title_ar');
            $table->longText('about_spc_details_en');
            $table->longText('about_spc_details_ar');
            $table->longText('about_spc_goal_one_en');
            $table->longText('about_spc_goal_two_en');
            $table->longText('about_spc_goal_three_en');
            $table->longText('about_spc_goal_four_en');
            $table->longText('about_spc_goal_one_ar');
            $table->longText('about_spc_goal_two_ar');
            $table->longText('about_spc_goal_three_ar');
            $table->longText('about_spc_goal_four_ar');
            $table->string('about_spc_photo');



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
        Schema::dropIfExists('fixed_strings');
    }
};
