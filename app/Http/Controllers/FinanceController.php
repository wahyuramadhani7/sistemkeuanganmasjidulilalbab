<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\FinancialSummary;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FinanceExport;
use App\Exports\FinancialSummaryExport;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::latest()->get();
        $totalIncome = Finance::where('type', 'income')->sum('amount');
        $totalExpense = Finance::where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        $infakJumat = Finance::where('type', 'income')->where('category', 'jumat')->sum('amount');
        $infakIdulFitri = Finance::where('type', 'income')->where('category', 'idul_fitri')->sum('amount');
        $infakIdulAdha = Finance::where('type', 'income')->where('category', 'idul_adha')->sum('amount');

        return view('finances.index', compact('finances', 'totalIncome', 'totalExpense', 'balance', 'infakJumat', 'infakIdulFitri', 'infakIdulAdha'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'raw_amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required|in:jumat,idul_fitri,idul_adha,lainnya',
            'date' => 'required|date',
        ]);

        Finance::create([
            'description' => $request->description,
            'amount' => $request->raw_amount,
            'type' => $request->type,
            'category' => $request->category,
            'date' => $request->date,
        ]);

        return redirect()->route('finances.index')->with('success', 'Data keuangan ditambahkan.');
    }

    public function destroy($id)
    {
        $finance = Finance::findOrFail($id);
        $finance->delete();

        return redirect()->route('finances.index')->with('success', 'Data keuangan berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new FinanceExport, 'data_keuangan_' . date('Y-m-d_His') . '.xlsx');
    }

    public function summary()
    {
        $summaries = FinancialSummary::latest()->get();
        return view('finances.summary', compact('summaries'));
    }

    public function storeSummary(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'total_donors' => 'required|integer|min:0',
            'total_income' => 'required|numeric|min:0',
            'total_expense' => 'required|numeric|min:0',
            'balance' => 'required|numeric',
        ]);

        FinancialSummary::create([
            'date' => $request->date,
            'total_donors' => $request->total_donors,
            'total_income' => $request->total_income,
            'total_expense' => $request->total_expense,
            'balance' => $request->balance,
        ]);

        return redirect()->route('finances.summary')->with('success', 'Ringkasan keuangan baru ditambahkan.');
    }

    public function exportSummary()
    {
        return Excel::download(new FinancialSummaryExport, 'ringkasan_keuangan_' . date('Y-m-d_His') . '.xlsx');
    }
}