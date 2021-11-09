<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('jobTitle')->nullable();
            $table->string('slug')->nullable();
            $table->string('category')->nullable();
            $table->string('zip')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('type')->nullable();
            $table->string('jobLength')->nullable();
            $table->string('shiftHours')->nullable();
            $table->string('salary')->nullable();
            $table->string('pay_type')->nullable();
            $table->text('requirements')->nullable();
            $table->text('about')->nullable();
            $table->text('specialties')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
