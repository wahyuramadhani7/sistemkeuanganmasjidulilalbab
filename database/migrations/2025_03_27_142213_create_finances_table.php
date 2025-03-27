<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('finances', function (Blueprint $table) {
        $table->id();
        $table->string('description');
        $table->decimal('amount', 15, 2);
        $table->enum('type', ['income', 'expense']);
        $table->date('date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('finances');
}
};
