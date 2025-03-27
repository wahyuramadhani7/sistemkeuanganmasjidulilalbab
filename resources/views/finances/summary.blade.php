@extends('layouts.app')
@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="margin: 20px 0; font-size: 24px; color: #333; text-align: center;">Ringkasan Keuangan Masjid</h1>
        
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form untuk menambah ringkasan baru --}}
        <h2 style="margin: 20px 0; text-align: center; color: #666;">Tambah Ringkasan Keuangan</h2>
        <form action="{{ route('finances.storeSummary') }}" method="POST" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            @csrf
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Tanggal</label>
                    <input 
                        type="date" 
                        name="date" 
                        required 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Jumlah Donatur</label>
                    <input 
                        type="number" 
                        name="total_donors" 
                        required 
                        min="0" 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Dana Terkumpul (Rp)</label>
                    <input 
                        type="number" 
                        name="total_income" 
                        step="0.01" 
                        required 
                        min="0" 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Dana Keluar (Rp)</label>
                    <input 
                        type="number" 
                        name="total_expense" 
                        step="0.01" 
                        required 
                        min="0" 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Sisa Saldo (Rp)</label>
                    <input 
                        type="number" 
                        name="balance" 
                        step="0.01" 
                        required 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
            </div>
            <button 
                type="submit" 
                style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; margin-top: 15px; cursor: pointer; transition: background-color 0.3s ease;"
                onmouseover="this.style.backgroundColor='#0056b3'"
                onmouseout="this.style.backgroundColor='#007bff'"
            >
                Tambah
            </button>
        </form>

        {{-- Export Button --}}
        <div style="margin-bottom: 20px; text-align: center;">
            <a href="{{ route('finances.exportSummary') }}" class="btn" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; text-decoration: none; display: inline-block;">
                Export ke Excel
            </a>
        </div>

        {{-- Tabel untuk menampilkan semua ringkasan --}}
        <h2 style="margin: 20px 0; text-align: center; color: #666;">Daftar Ringkasan Keuangan</h2>
        
        @if($summaries->isEmpty())
            <p style="text-align: center; color: #555; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                Belum ada data ringkasan keuangan.
            </p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <thead>
                        <tr style="background-color: #f8f9fa;">
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tanggal</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Jumlah Donatur</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Dana Terkumpul</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Dana Keluar</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Sisa Saldo</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($summaries as $summary)
                            <tr style="border-bottom: 1px solid #f2f2f2;">
                                <td style="padding: 12px;">{{ $summary->date }}</td>
                                <td style="padding: 12px;">{{ $summary->total_donors }} Orang</td>
                                <td style="padding: 12px; color: #28a745;">Rp {{ number_format($summary->total_income, 2, ',', '.') }}</td>
                                <td style="padding: 12px; color: #dc3545;">Rp {{ number_format($summary->total_expense, 2, ',', '.') }}</td>
                                <td style="padding: 12px; color: #007bff;">Rp {{ number_format($summary->balance, 2, ',', '.') }}</td>
                                <td style="padding: 12px;">{{ $summary->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection