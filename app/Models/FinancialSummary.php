<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialSummary extends Model
{
    protected $fillable = ['date', 'total_donors', 'total_income', 'total_expense', 'balance'];
}