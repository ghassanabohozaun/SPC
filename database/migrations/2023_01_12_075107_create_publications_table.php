<?php

use App\Models\Projects;
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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->string('status')->nullable();
            $table->string('photo')->nullable();
            $table->enum('language',['ar','ar_en'])->default('ar');
            $table->text('file')->nullable();
            $table->date('date')->nullable();
            $table->string('writer')->nullable();
            $table->enum('type', ['Advertisements','Brochures','CaseStudy','ScientificArticles'])->default('Advertisements');
            $table->integer('views')->default(1);
            $table->foreignIdFor(Projects::class)->nullable();
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
        Schema::dropIfExists('publications');
    }
};
