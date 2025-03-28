<?php

namespace App\Exports;

use App\Models\Zakat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ZakatsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Zakat::latest()->get();
    }

    public function headings(): array
    {
        return [
            'Nama Muzakki',
            'Jenis Zakat',
            'Jumlah',
            'Tanggal',
        ];
    }

    public function map($zakat): array
    {
        return [
            $zakat->donor_name,
            $zakat->type == 'mal' ? 'Zakat Mal' : 'Zakat Fitrah',
            $zakat->type == 'mal' ? 
                'Rp ' . number_format($zakat->amount, 2, ',', '.') : 
                number_format($zakat->amount, 2, ',', '.') . ' kg beras',
            $zakat->date,
        ];
    }
}