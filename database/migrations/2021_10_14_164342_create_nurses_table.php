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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->string('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('accountHolderFirstName')->nullable();
            $table->string('accountHolderLastName')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('socialSecurityNumber')->nullable();
            $table->string('bankName')->nullable();
            $table->string('rountingNumber')->nullable();
            $table->string('accountNumber')->nullable();
            $table->string('zip')->nullable();
            $table->string('insurance')->nullable();
            $table->string('salary')->nullable();
            $table->tinyInteger('travel')->nullable();
            $table->tinyInteger('experienceInYears')->nullable();
            $table->text('experiences')->nullable();
            $table->text('about')->nullable();
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
