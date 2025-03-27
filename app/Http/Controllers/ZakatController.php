<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

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
        $request->validate([
            'donor_name' => 'required',
            'type' => 'required|in:mal,fitrah',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $data = $request->all();
        $data['unit'] = $request->type === 'mal' ? 'uang' : 'beras'; // Tentukan satuan berdasarkan tipe

        Zakat::create($data);
        return redirect()->route('zakats.index')->with('success', 'Data zakat ditambahkan.');
    }
}