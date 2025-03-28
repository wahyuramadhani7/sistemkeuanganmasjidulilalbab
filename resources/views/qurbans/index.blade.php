@extends('layouts.app')

@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="margin: 20px 0; font-size: 24px; color: #333; text-align: center;">Manajemen Qurban</h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Qurban Input Form dan Export Button --}}
        <div style="background-color: #f8f9fa; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <form action="{{ route('qurbans.store') }}" method="POST" style="display: inline;">
                @csrf
                <div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: flex-end;">
                    <div class="form-group" style="flex: 2; min-width: 200px;">
                        <label style="display: block; margin-bottom: 5px; color: #555;">Nama Peserta Qurban</label>
                        <input 
                            type="text" 
                            name="name" 
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
                    <div class="form-group" style="flex: 1; min-width: 150px;">
                        <button 
                            type="submit" 
                            style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#218838'"
                            onmouseout="this.style.backgroundColor='#28a745'"
                        >
                            Tambah
                        </button>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 150px;">
                        <a 
                            href="{{ route('qurbans.export') }}"
                            style="display: block; text-align: center; padding: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#0069d9'"
                            onmouseout="this.style.backgroundColor='#007bff'"
                        >
                            Export Excel
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- Qurban Table --}}
        <div style="overflow-x: auto;">
            @foreach($qurbans as $groupNumber => $members)
                <h3 style="margin: 15px 0; color: #28a745;">Rombongan {{ $groupNumber }}</h3>
                <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f8f9fa;">
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">No</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Nama Peserta</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tanggal</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Tahun</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $index => $qurban)
                            <tr style="border-bottom: 1px solid #f2f2f2;">
                                <td style="padding: 12px;">{{ $index + 1 }}</td>
                                <td style="padding: 12px;">{{ $qurban->name }}</td>
                                <td style="padding: 12px;">{{ date('d-m-Y', strtotime($qurban->date)) }}</td>
                                <td style="padding: 12px;">{{ date('Y', strtotime($qurban->date)) }}</td>
                                <td style="padding: 12px;">
                                    <form action="{{ route('qurbans.destroy', $qurban->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                            style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;"
                                            onmouseover="this.style.backgroundColor='#c82333'"
                                            onmouseout="this.style.backgroundColor='#dc3545'"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection