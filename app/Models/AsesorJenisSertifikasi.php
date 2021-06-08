<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesorJenisSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'asesor_jenis_sertifikasi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_asesor',
        'id_ref_jenis_sertifikasi',
        'tanggal_awal_berlaku',
        'tanggal_akhir_berlaku',
        'no_sertifikat'
    ];

    public function asesor() {
        return $this->belongsTo(Asesor::class, 'id_asesor', 'id');
    }

    public function refJenisSertifikasi() {
        return $this->belongsTo(RefJenisSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }

    public function asesorPendaftar() {
        return $this->hasMany(AsesorPendaftar::class, 'id_asesor_jenis_sertifikasi', 'id');
    }
}
