<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    protected $fillable = ['tindakan_id', 'obat_id', 'jumlah', 'catatan'];

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}