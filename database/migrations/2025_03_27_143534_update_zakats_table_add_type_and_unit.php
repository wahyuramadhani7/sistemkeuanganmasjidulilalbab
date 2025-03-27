<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateZakatsTableAddTypeAndUnit extends Migration
{
    public function up()
    {
        Schema::table('zakats', function (Blueprint $table) {
            $table->enum('type', ['mal', 'fitrah'])->default('mal')->after('donor_name'); // Jenis zakat
            $table->string('unit')->default('uang')->after('amount'); // Satuan: uang atau beras
        });
    }

    public function down()
    {
        Schema::table('zakats', function (Blueprint $table) {
            $table->dropColumn(['type', 'unit']);
        });
    }
}