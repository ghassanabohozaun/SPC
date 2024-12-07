<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_path');
            $table->string('file_after_upload');
            $table->string('full_path_after_upload');
            $table->string('file_mimes_type'); // gif , png , jpg , pdf ,etc
            $table->string('file_type');  // means this file for news , products  ,etc
            $table->string('relation_id'); // id of new  ,product ,etc
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
        Schema::dropIfExists('files');
    }
}
