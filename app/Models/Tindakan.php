<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindakan extends Model
{
    use HasFactory;

    protected $table = 'tindakans';

    protected $fillable = ['nama', 'deskripsi', 'tarif'];
    
    public function obat()
{
    return $this->belongsToMany(Obat::class, 'resep_obats')
                ->withPivot('jumlah', 'catatan')
                ->withTimestamps();
}
public function resepObats()
{
    return $this->hasMany(ResepObat::class);
}
}