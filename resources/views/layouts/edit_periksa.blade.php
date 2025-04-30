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
                            <label for="obat">Obat</label><br>
                            @foreach ($obats as $obat)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="obat_ids[]" value="{{ $obat->id }}"
                                    data-harga="{{ $obat->harga }}"
                                    @if(isset($selectedObatIds) && in_array($obat->id, $selectedObatIds)) checked @endif>
                                <label class="form-check-label" for="obat{{ $obat->id }}">
                                    {{ $obat->nama_obat }} - {{ $obat->kemasan }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                </label>
                            </div>
                            @endforeach
                            <small class="form-text text-muted">Pilih obat yang akan diberikan kepada pasien.</small>
                        </div>
                        <div class="form-group">
                            <label for="biaya_periksa">Biaya Pemeriksaan</label>
                            <input type="number" class="form-control" id="biaya_periksa" name="biaya_periksa" value="{{$periksa->biaya_periksa}}" required>
                        </div>

                        <div class="form-group">
                            <label for="totalHarga">Total Harga</label><span>(Biaya_Pemeriksaan + Harga_Obat)</span>
                            <input type="number" class="form-control" id="totalHarga" name="totalHarga" value="{{$totalHarga}}" readonly>
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
        const checkboxes = document.querySelectorAll('input[name="obat_ids[]"]');
        const totalHargaInput = document.getElementById('totalHarga');
        const biayaPeriksaInput = document.getElementById('biaya_periksa');

        // Fungsi untuk menghitung total harga
        function hitungTotalHarga() {
            // Selalu ambil nilai terbaru dari biaya periksa
            const biayaPeriksa = parseInt(biayaPeriksaInput.value) || 0;

            let totalObat = 0;
            // Loop melalui setiap checkbox untuk menghitung harga obat yang dipilih
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const harga = parseInt(checkbox.dataset.harga);
                    if (!isNaN(harga)) {
                        totalObat += harga;
                    }
                }
            });

            // Hitung dan set total harga
            totalHargaInput.value = biayaPeriksa + totalObat;
        }

        // Dengarkan perubahan pada pilihan obat
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', hitungTotalHarga);
        });

        // Dengarkan perubahan pada biaya periksa
        biayaPeriksaInput.addEventListener('input', hitungTotalHarga);

        // Hitung total awal saat halaman dimuat
        hitungTotalHarga();
    });
</script>
@endsection