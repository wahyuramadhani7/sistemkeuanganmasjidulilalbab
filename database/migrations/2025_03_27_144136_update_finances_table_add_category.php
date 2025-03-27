<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFinancesTableAddCategory extends Migration
{
    public function up()
    {
        Schema::table('finances', function (Blueprint $table) {
            $table->enum('category', ['jumat', 'idul_fitri', 'idul_adha', 'lainnya'])
                  ->default('lainnya')
                  ->after('type'); // Kategori infak
        });
    }

    public function down()
    {
        Schema::table('finances', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}