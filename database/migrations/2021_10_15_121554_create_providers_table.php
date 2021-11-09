<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('hiringPerson')->nullable();
            $table->string('hiringPersonEmail')->nullable();
            $table->string('hiringPersonPhone')->nullable();
            $table->string('paymentPersonName')->nullable();
            $table->string('paymentPersonEmail')->nullable();
            $table->string('paymentPersonPhone')->nullable();
            $table->string('businessType')->nullable();
            $table->string('zip')->nullable();
            $table->string('experince')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
