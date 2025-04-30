<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class periksa extends Model
{
    protected $fillable = [ //ini nanti digunakan untuk tabel yang hanya boleh diiisi
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
        
    ];

    //menggunakan belongs to karena merupakan child atau anak,dimana id_dokter,dan id_pasien mempunyai relasi ke id users
    //relasi ke user sebagai dokter
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    //relasi ke user sebagai pasien
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function detailPeriksa(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
    public function obats(): BelongsToMany
    {
        return $this->belongsToMany(Obat::class, 'obat_periksa', 'periksa_id', 'obat_id');
    }
}
