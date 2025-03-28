<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQurbansTable extends Migration
{
    public function up()
    {
        Schema::create('qurbans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('group_number')->nullable();
            $table->date('date')->nullable(); // Pastikan kolom ini ada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qurbans');
    }
}