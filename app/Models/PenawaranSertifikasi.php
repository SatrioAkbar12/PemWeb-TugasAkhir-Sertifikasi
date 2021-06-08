<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'penawaran_sertifikasi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_ref_jenis_sertifikasi',
        'deskripsi_penawaran',
        'periode',
        'created_at',
        'updated_at',
        'created_by',
        'edited_by',
        'is_aktif'
    ];

    public function refJenisSertifikasi() {
        return $this->belongsTo(RefJenisSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }
}
