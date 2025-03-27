<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinancialSummariesTableReplacePeriodWithDate extends Migration
{
    public function up()
    {
        Schema::table('financial_summaries', function (Blueprint $table) {
            $table->dropColumn('period'); // Hapus kolom period
            $table->date('date')->after('id'); // Tambah kolom date
        });
    }

    public function down()
    {
        Schema::table('financial_summaries', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->string('period')->nullable()->after('id');
        });
    }
}