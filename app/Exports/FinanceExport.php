<?php

namespace App\Exports;

use App\Models\Finance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinanceExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Finance::latest()->get();
    }

    public function headings(): array
    {
        return [
            'Keterangan',
            'Jumlah',
            'Tipe',
            'Kategori',
            'Tanggal',
        ];
    }

    public function map($finance): array
    {
        return [
            $finance->description,
            $finance->amount,
            $finance->type == 'income' ? 'Pemasukan' : 'Pengeluaran',
            $this->getCategoryLabel($finance->category),
            $finance->date,
        ];
    }

    private function getCategoryLabel($category)
    {
        switch ($category) {
            case 'jumat':
                return 'Infak Hari Jumat';
            case 'idul_fitri':
                return 'Infak Idul Fitri';
            case 'idul_adha':
                return 'Infak Idul Adha';
            default:
                return 'Lainnya';
        }
    }
}