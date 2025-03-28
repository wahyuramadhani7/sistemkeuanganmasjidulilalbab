<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToQurbansTable extends Migration
{
    public function up()
    {
        Schema::table('qurbans', function (Blueprint $table) {
            $table->date('date')->nullable(); // Tambahkan kolom date
        });
    }

    public function down()
    {
        Schema::table('qurbans', function (Blueprint $table) {
            $table->dropColumn('date'); // Hapus kolom date jika rollback
        });
    }
}