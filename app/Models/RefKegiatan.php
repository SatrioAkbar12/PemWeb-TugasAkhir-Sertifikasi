<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKegiatan extends Model
{
    use HasFactory;

    protected $table = 'ref_kegiatan';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'created_at',
        'created_by'
    ];

    public function jadwal() {
        return $this->hasMany(Jadwal::class, 'id_kegiatan', 'id');
    }
}
