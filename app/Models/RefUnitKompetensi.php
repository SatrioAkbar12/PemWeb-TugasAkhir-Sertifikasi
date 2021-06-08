<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefUnitKompetensi extends Model
{
    use HasFactory;

    protected $table = 'ref_unit_kompetensi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama',
        'is_aktif'
    ];

    public function instrumenAsesmenKompetensi() {
        return $this->hasMany(InstrumenAsesmenKompetensi::class, 'id_ref_unit_kompetensi', 'id');
    }

    public function unitKompetensiSertifikasi() {
        return $this->hasMany(UnitKompetensiSertifikasi::class, 'id_ref_kompetensi', 'id');
    }
}
