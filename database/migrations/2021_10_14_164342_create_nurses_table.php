<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->tinyInteger('llm')->nullable();
            $table->integer('requestSalary')->nullable();
            $table->text('specialties')->nullable();
            $table->string('experienceInYears')->nullable();
            $table->text('bars')->nullable();
            $table->string('license')->nullable();
            $table->text('otherSkills')->nullable();
            $table->text('experience')->nullable();
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
        Schema::dropIfExists('nurses');
    }
}
