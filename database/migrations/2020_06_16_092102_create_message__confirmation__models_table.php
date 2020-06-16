<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageConfirmationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message__confirmation__models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('greeting');
            $table->string('intro');
            $table->string('outro');
            $table->string('farewell');
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
        Schema::dropIfExists('message__confirmation__models');
    }
}
