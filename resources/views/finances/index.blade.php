@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="margin: 20px 0; font-size: 24px; color: #333;">Keuangan Masjid</h1>
        
        {{-- Financial Summary Cards --}}
        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Total Pemasukan</h2>
                <p style="font-size: 1.5em; color: #28a745; font-weight: bold;">{{ 'Rp ' . number_format($totalIncome, 0, ',', '.') }}</p>
            </div>
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Total Pengeluaran</h2>
                <p style="font-size: 1.5em; color: #dc3545; font-weight: bold;">{{ 'Rp ' . number_format($totalExpense, 0, ',', '.') }}</p>
            </div>
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Saldo</h2>
                <p style="font-size: 1.5em; color: #007bff; font-weight: bold;">{{ 'Rp ' . number_format($balance, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- Infak Summary Cards --}}
        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Infak Hari Jumat</h2>
                <p style="font-size: 1.5em; color: #17a2b8; font-weight: bold;">{{ 'Rp ' . number_format($infakJumat, 0, ',', '.') }}</p>
            </div>
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Infak Idul Fitri</h2>
                <p style="font-size: 1.5em; color: #17a2b8; font-weight: bold;">{{ 'Rp ' . number_format($infakIdulFitri, 0, ',', '.') }}</p>
            </div>
            <div class="card" style="flex: 1; min-width: 200px; background-color: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 10px; color: #666;">Infak Idul Adha</h2>
                <p style="font-size: 1.5em; color: #17a2b8; font-weight: bold;">{{ 'Rp ' . number_format($infakIdulAdha, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Input Form --}}
        <form action="{{ route('finances.store') }}" method="POST" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            @csrf
            <input type="hidden" name="source" value="index">
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <div class="form-group" style="flex: 2; min-width: 200px;">
                    <label style="display: block; margin-bottom: 5px;">Keterangan</label>
                    <input type="text" name="description" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                <div class="form-group" style="flex: 1; min-width: 100px;">
                    <label style="display: block; margin-bottom: 5px;">Jumlah (Rp)</label>
                    <input type="text" name="amount" id="amount" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" onkeyup="formatRupiah(this)">
                    <input type="hidden" name="raw_amount" id="raw_amount">
                </div>
                <div class="form-group" style="flex: 1; min-width: 100px;">
                    <label style="display: block; margin-bottom: 5px;">Tipe</label>
                    <select name="type" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="income">Pemasukan</option>
                        <option value="expense">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group" style="flex: 1; min-width: 100px;">
                    <label style="display: block; margin-bottom: 5px;">Kategori</label>
                    <select name="category" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="jumat">Infak Hari Jumat</option>
                        <option value="idul_fitri">Infak Idul Fitri</option>
                        <option value="idul_adha">Infak Idul Adha</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group" style="flex: 1; min-width: 100px;">
                    <label style="display: block; margin-bottom: 5px;">Tanggal</label>
                    <input type="date" name="date" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
            </div>
            <button type="submit" class="btn" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; margin-top: 15px; cursor: pointer;">
                Tambah
            </button>
        </form>

        {{-- Export Button --}}
        <div style="margin-bottom: 20px;">
            <a href="{{ route('finances.export') }}" class="btn" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; text-decoration: none; display: inline-block;">
                Export ke Excel
            </a>
        </div>

        {{-- Transaction Table --}}
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Keterangan</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Jumlah</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tipe</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Kategori</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tanggal</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                        <tr style="border-bottom: 1px solid #f2f2f2;">
                            <td style="padding: 12px;">{{ $finance->description }}</td>
                            <td style="padding: 12px;">{{ 'Rp ' . number_format($finance->amount, 0, ',', '.') }}</td>
                            <td style="padding: 12px;">{{ $finance->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                            <td style="padding: 12px;">
                                @if($finance->category == 'jumat') Infak Hari Jumat
                                @elseif($finance->category == 'idul_fitri') Infak Idul Fitri
                                @elseif($finance->category == 'idul_adha') Infak Idul Adha
                                @else Lainnya @endif
                            </td>
                            <td style="padding: 12px;">{{ $finance->date }}</td>
                            <td style="padding: 12px;">
                                <form action="{{ route('finances.destroy', $finance->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        function formatRupiah(input) {
            let value = input.value;
            value = value.replace(/[^0-9]/g, '');
            let formatted = new Intl.NumberFormat('id-ID').format(value);
            input.value = formatted;
            document.getElementById('raw_amount').value = value;
        }
    </script>
    @endpush
@endsection