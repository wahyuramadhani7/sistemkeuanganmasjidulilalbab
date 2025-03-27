<?php

namespace App\Exports;

use App\Models\FinancialSummary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinancialSummaryExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return FinancialSummary::latest()->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jumlah Donatur',
            'Dana Terkumpul',
            'Dana Keluar',
            'Sisa Saldo',
            'Tanggal Dibuat',
        ];
    }

    public function map($summary): array
    {
        return [
            $summary->date,
            $summary->total_donors,
            $summary->total_income,
            $summary->total_expense,
            $summary->balance,
            $summary->created_at->format('Y-m-d H:i'),
        ];
    }
}