<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_penawaran_sertifikasi',
        'id_asesi',
        'status_akhir_sertifikasi',
        'tanggal_status_akhir',
        'created_by',
        'edited_by',
        'status_pendaftaran'
    ];

    public function asesorPendaftar() {
        return $this->hasOne(AsesorPendaftar::class, 'id_pendaftar', 'id');
    }

    public function penawaranSertifikasi() {
        return $this->belongsTo(PenawaranSertifikasi::class, 'id_penawaran_sertifikasi', 'id');
    }

    public function asesi() {
        return $this->belongsTo(Asesi::class, 'id_asesi', 'id');
    }

    public function pendaftarAsesmen() {
        return $this->hasMany(PendaftarInstrumen::class, 'id_pendaftar', 'id');
    }

    public function pendaftarKuesioner() {
        return $this->hasMany(PendaftarKuesioner::class, 'id_pendaftar', 'id');
    }

    public function pendaftarSyarat() {
        return $this->hasMany(PendaftarSyarat::class, 'id_pendaftar', 'id');
    }
}
