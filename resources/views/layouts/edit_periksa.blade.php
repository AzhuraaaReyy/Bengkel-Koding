@extends('layouts.main')
@section('title', 'Edit Obat')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Memeriksa Pasien</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Memeriksa</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- full width column -->
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form memeriksa Pasien</h3>
                </div>
                <!-- form start -->
                <form action="{{ route('pasien.update',$periksa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $periksa->pasien->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="obat">Obat</label>
                            <select name="obat_ids[]" id="obat" class="form-control" required>
                                <!-- Placeholder -->
                                <option value="" disabled selected>Pilihan Obat</option>

                                <!-- Daftar obat -->
                                @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                    {{ $obat->nama_obat }} - {{ $obat->kemasan }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pilih obat yang akan diberikan kepada pasien.</small>
                        </div>
                        <!-- Simpan biaya periksa di hidden field -->
                        <input type="hidden" id="biaya_periksa" value="{{ $periksa->biaya_periksa }}">
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ $totalHarga }}" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Script untuk hitung total harga otomatis -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectObat = document.getElementById('obat');
        const totalHargaInput = document.getElementById('total_harga');
        const biayaPeriksa = parseInt(document.getElementById('biaya_periksa').value) || 0;

        function hitungTotalHarga() {
            let totalObat = 0;
            Array.from(selectObat.selectedOptions).forEach(option => {
                const harga = parseInt(option.dataset.harga);
                if (!isNaN(harga)) totalObat += harga;
            });
            totalHargaInput.value = biayaPeriksa + totalObat;
        }

        selectObat.addEventListener('change', hitungTotalHarga);
    });
</script>
@endsection