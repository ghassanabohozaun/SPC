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
        Schema::create('test_scales', function (Blueprint $table) {
            $table->id();
            $table->text('statement')->nullable();
            $table->longText('evaluation')->nullable();
            $table->double('minimum')->nullable();
            $table->double('maximum')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('test_id')->constrained('id')->cascadeOnDelete();
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
        Schema::dropIfExists('test_scales');
    }
};
