<div class="card-body">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periksas as $periksa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $periksa->pasien->nama ?? '-' }}</td> {{-- Nama pasien --}}
                <td>
                    <a href="{{ route('pasien.edit', $periksa->id) }}" class="btn btn-primary btn-sm">
                        {{ $periksa->status == 'Diperiksa' ? 'Edit' : 'Periksa' }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>