<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialSummariesTable extends Migration
{
    public function up()
    {
        Schema::create('financial_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('total_donors')->default(0); // Jumlah donatur
            $table->decimal('total_income', 15, 2)->default(0); // Dana terkumpul
            $table->decimal('total_expense', 15, 2)->default(0); // Dana keluar
            $table->decimal('balance', 15, 2)->default(0); // Sisa saldo
            $table->timestamps();
        });

        // Inisialisasi dengan satu baris data
        DB::table('financial_summaries')->insert([
            'total_donors' => 0,
            'total_income' => 0,
            'total_expense' => 0,
            'balance' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('financial_summaries');
    }
}