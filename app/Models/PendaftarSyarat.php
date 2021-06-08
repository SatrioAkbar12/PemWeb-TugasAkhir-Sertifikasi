<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarSyarat extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_syarat';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_syarat_sertifikasi',
        'id_pendaftar',
        'status_verifikasi_syarat',
        'path_bukti',
        'verifikasi_asesor',
        'komentar_asesor',
        'verified_by',
        'verified_at',
        'created_by',
        'edited_by'
    ];

    public function syaratSertifikasi() {
        return $this->belongsTo(SyaratSertifikasi::class, 'id_syarat_sertifikasi', 'id');
    }

    public function pendaftar() {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }
}
