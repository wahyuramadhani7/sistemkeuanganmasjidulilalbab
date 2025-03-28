@extends('layouts.app')
@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="margin: 20px 0; font-size: 24px; color: #333; text-align: center;">Manajemen Zakat</h1>

        {{-- Zakat Summary Cards --}}
        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 20px; justify-content: center;">
            <div class="card" style="flex: 1; min-width: 250px; max-width: 400px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666; text-align: center;">Total Zakat Mal</h2>
                <p style="font-size: 1.5em; color: #28a745; font-weight: bold; text-align: center;">
                    Rp {{ number_format($totalZakatMal, 2, ',', '.') }}
                </p>
            </div>
            <div class="card" style="flex: 1; min-width: 250px; max-width: 400px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666; text-align: center;">Total Zakat Fitrah</h2>
                <p style="font-size: 1.5em; color: #007bff; font-weight: bold; text-align: center;">
                    {{ number_format($totalZakatFitrah, 2, ',', '.') }} kg beras
                </p>
            </div>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Zakat Input Form --}}
        <form action="{{ route('zakats.store') }}" method="POST" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            @csrf
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <div class="form-group" style="flex: 2; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Nama Muzakki</label>
                    <input 
                        type="text" 
                        name="donor_name" 
                        required 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 150px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Jenis Zakat</label>
                    <select 
                        name="type" 
                        required 
                        onchange="updateUnitLabel(this)"
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                        <option value="mal">Zakat Mal (Uang)</option>
                        <option value="fitrah">Zakat Fitrah (Beras)</option>
                    </select>
                </div>
                <div class="form-group" style="flex: 1; min-width: 150px;">
                    <label id="amount-label" style="display: block; margin-bottom: 5px; color: #555;">Jumlah (Rp)</label>
                    <input 
                        type="number" 
                        name="amount" 
                        step="0.01" 
                        required 
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                    >
                </div>
                <div class="form-group" style="flex: 1; min-width: 150px;">
                    <label style="display: block; margin-bottom: 5px; color: #555;">Tanggal</label>
                    <input 
                        type="date" 
                        name="date" 
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
        <div style="margin-bottom: 20px; text-align: right;">
            <a href="{{ route('zakats.export') }}" 
               style="padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; transition: background-color 0.3s ease;"
               onmouseover="this.style.backgroundColor='#218838'"
               onmouseout="this.style.backgroundColor='#28a745'">
                Export ke Excel
            </a>
        </div>

        {{-- Zakat Table --}}
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Nama Muzakki</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Jenis</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Jumlah</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zakats as $zakat)
                        <tr style="border-bottom: 1px solid #f2f2f2;">
                            <td style="padding: 12px;">{{ $zakat->donor_name }}</td>
                            <td style="padding: 12px;">
                                {{ $zakat->type == 'mal' ? 'Zakat Mal' : 'Zakat Fitrah' }}
                            </td>
                            <td style="padding: 12px; color: {{ $zakat->type == 'mal' ? '#28a745' : '#007bff' }}">
                                {{ $zakat->type == 'mal'
                                    ? 'Rp ' . number_format($zakat->amount, 2, ',', '.')
                                    : number_format($zakat->amount, 2, ',', '.') . ' kg beras' }}
                            </td>
                            <td style="padding: 12px;">{{ $zakat->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateUnitLabel(select) {
            const label = document.getElementById('amount-label');
            const amountInput = document.querySelector('input[name="amount"]');
            
            if (select.value === 'mal') {
                label.textContent = 'Jumlah (Rp)';
                amountInput.step = '0.01';
            } else {
                label.textContent = 'Jumlah (kg beras)';
                amountInput.step = '0.1';
            }
        }
    </script>
@endsection