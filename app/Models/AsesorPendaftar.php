<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesorPendaftar extends Model
{
    use HasFactory;

    protected $table = 'asesor_pendaftar';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_asesor_jenis_sertifikasi',
        'id_pendaftar',
        'hasil'
    ];

    public function asesorJenisSertifikasi() {
        return $this->belongsTo(AsesorJenisSertifikasi::class, 'id_asesor_jenis_sertifikasi', 'id');
    }

    public function pendaftar() {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }
}
