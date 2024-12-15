<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('person_ip');
            $table->string('person_name');
            $table->string('person_email');
            $table->longText('commentary');
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->enum('gender', ['male', 'female', 'others']);
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            // $table->integer('post_id');
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
        Schema::dropIfExists('comments');
    }
}
