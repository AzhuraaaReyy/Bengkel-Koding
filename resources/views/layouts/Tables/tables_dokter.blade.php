<div class="card-body">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center;">Nama Dokter</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($dokters as $d)
            <tr>
                <td>{{ $d->nama }}</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>