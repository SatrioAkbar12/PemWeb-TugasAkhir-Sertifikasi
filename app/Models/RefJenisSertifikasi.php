<?php

namespace App\Models;

use App\Http\Controllers\Admin\UnitKompetensiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJenisSertifikasi extends Model
{
    use HasFactory;

    protected $table = 'ref_jenis_sertifikasi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama',
        'keterangan',
        'status_jenis_sertifikasi',
        'created_at',
        'updated_at',
        'created_by',
        'edited_by',
        'is_aktif',
    ];

    public function syaratSertifikasi() {
        return $this->hasMany(SyaratSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }

    public function unitKompetensiSertifikasi() {
        return $this->hasMany(UnitKompetensiSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }

    public function penawaranSertifikasi() {
        return $this->hasMany(PenawaranSertifikasi::class, 'id_ref_jenis_sertifikasi', 'id');
    }
}
