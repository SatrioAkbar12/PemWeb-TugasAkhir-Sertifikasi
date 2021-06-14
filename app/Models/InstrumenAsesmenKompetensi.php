<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumenAsesmenKompetensi extends Model
{
    use HasFactory;

    protected $table = 'instrumen_asesmen_kompetensi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    public $timestamps = false;

    protected $fillable = [
        'id_ref_unit_kompetensi',
        'instrumen_pertanyaan',
        'status_instrumen',
        'is_aktif'
    ];

    public function refUnitKompetensi() {
        return $this->belongsTo(RefUnitKompetensi::class, 'id_ref_unit_kompetensi', 'id');
    }

    public function PendaftarInstrumen() {
        return $this->hasMany(PendaftarInstrumen::class, 'id_instrumen_pendaftar', 'id');
    }
}
