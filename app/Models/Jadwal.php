<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_penawaran_sertifikasi',
        'id_kegiatan',
        'tanggal_awal',
        'tanggal_akhir',
        'created_at',
        'created_by',
        'is_show',
        'deskripsi'
    ];

    public function penawaranSertifikasi() {
        return $this->belongsTo(PenawaranSertifikasi::class, 'id_penawaran_sertifikasi', 'id');
    }

    public function refKegiatan() {
        return $this->belongsTo(RefKegiatan::class, 'id_kegiatan', 'id');
    }
}
