<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Obat extends Model
{
    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];

    public function detailPeriksa(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
    public function periksas(): BelongsToMany
    {
        return $this->belongsToMany(Periksa::class, 'obat_periksa', 'obat_id', 'periksa_id');
    }
}
