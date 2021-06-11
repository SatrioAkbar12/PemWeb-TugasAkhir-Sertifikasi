<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensiSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'unit_kompetensi_sertifikasi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    public $timestamps = false;

    protected $fillable = [
        'id_ref_jenis_sertifikasi',
        'id_ref_kompetensi',
        'is_aktif'
    ];

    public function refJenisSertifikasi() {
        return $this->belongsTo(RefJenisSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }

    public function refUnitKompetensi() {
        return $this->belongsTo(RefUnitKompetensi::class, 'id_ref_kompetensi', 'id');
    }
}
