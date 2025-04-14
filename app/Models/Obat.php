<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'satuan', 'stok', 'harga'];

    public function tindakan()
{
    return $this->belongsToMany(Tindakan::class, 'resep_obats')
                ->withPivot('jumlah', 'catatan')
                ->withTimestamps();
}
public function resepObats()
{
    return $this->hasMany(ResepObat::class);
}
}