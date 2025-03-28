<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ZakatsExport;

class ZakatController extends Controller
{
    public function index()
    {
        $zakats = Zakat::latest()->get();
        $totalZakatMal = Zakat::where('type', 'mal')->sum('amount');
        $totalZakatFitrah = Zakat::where('type', 'fitrah')->sum('amount');

        return view('zakats.index', compact('zakats', 'totalZakatMal', 'totalZakatFitrah'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'donor_name' => 'required|string|max:255',
                'type' => 'required|in:mal,fitrah',
                'amount' => 'required|numeric|min:0',
                'date' => 'required|date',
            ]);

            $data = $request->all();
            $data['unit'] = $request->type === 'mal' ? 'uang' : 'beras';

            $zakat = Zakat::create($data);

            if (!$zakat) {
                throw new \Exception('Gagal menyimpan data zakat.');
            }

            return redirect()->route('zakats.index')->with('success', 'Data zakat berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new ZakatsExport, 'data_zakat_' . date('Y-m-d') . '.xlsx');
    }
}