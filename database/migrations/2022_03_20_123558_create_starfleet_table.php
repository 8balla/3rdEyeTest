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
        Schema::create('starfleets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('obj')->default('0');
            $table->string('name');
            $table->string('class');
            $table->string('crew');
            $table->string('model');
            $table->string('image');
            $table->integer('value');
            $table->string('status');
            $table->pivot(['armament', 'id', 'title', 'qty']);
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
        Schema::dropIfExists('starfleets');
    }
};
