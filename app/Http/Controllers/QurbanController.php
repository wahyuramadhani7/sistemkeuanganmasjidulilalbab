<?php

namespace App\Http\Controllers;

use App\Models\Qurban;
use App\Exports\QurbanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QurbanController extends Controller
{
    public function index()
    {
        $qurbans = Qurban::all()->groupBy('group_number');
        return view('qurbans.index', compact('qurbans'));
    }

    public function create()
    {
        return view('qurbans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date'
        ]);
        
        $lastGroup = Qurban::max('group_number');
        $currentCount = Qurban::where('group_number', $lastGroup)->count();

        if ($currentCount >= 7 || $lastGroup === null) {
            $groupNumber = $lastGroup + 1;
        } else {
            $groupNumber = $lastGroup;
        }

        Qurban::create([
            'name' => $request->name,
            'group_number' => $groupNumber,
            'date' => $request->date,
        ]);

        return redirect('/qurbans')->with('success', 'Data qurban berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $qurban = Qurban::findOrFail($id);
        $qurban->delete();
        
        return redirect('/qurbans')->with('success', 'Data qurban berhasil dihapus');
    }

    // Fungsi export baru
    public function export()
    {
        return Excel::download(new QurbanExport, 'data_qurban_' . date('Ymd_His') . '.xlsx');
    }
}