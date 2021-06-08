<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'syarat_sertifikasi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_ref_jenis_sertifikasi',
        'syarat',
        'is_aktif'
    ];

    public function refJenisSertifikasi() {
        return $this->belongsTo(RefJenisSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }

    public function pendaftarSyarat() {
        return $this->hasMany(PendaftarSyarat::class, 'id_syarat_sertifikasi', 'id');
    }
}
