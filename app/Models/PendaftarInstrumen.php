<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarInstrumen extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_instrumen';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_pendaftar',
        'id_instrumen_asesmen',
        'jawaban_self_asesmen',
        'path_bukti',
        'komentar_bukti',
        'jawaban_asesor_verifikasi',
        'verified_by',
        'verified_at',
        'created_by',
        'edited_by'
    ];

    public function pendaftar() {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }

    public function instrumenAsesmenKompetensi() {
        return $this->belongsTo(InstrumenAsesmenKompetensi::class, 'id_instrumen_asesmen', 'id');
    }
}
