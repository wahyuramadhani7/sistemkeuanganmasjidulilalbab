<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinancialSummariesTableAddPeriod extends Migration
{
    public function up()
    {
        Schema::table('financial_summaries', function (Blueprint $table) {
            $table->string('period')->nullable()->after('id'); // Kolom untuk periode (misal: "Januari 2025")
        });

        // Kosongkan tabel untuk memulai dari awal
        DB::table('financial_summaries')->truncate();
    }

    public function down()
    {
        Schema::table('financial_summaries', function (Blueprint $table) {
            $table->dropColumn('period');
        });
    }
}