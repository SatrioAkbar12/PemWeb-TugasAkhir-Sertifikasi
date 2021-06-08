<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesi extends Model
{
    use HasFactory;

    protected $table = 'asesi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama',
        'nim',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_ref_negara',
        'alamat',
        'no_telepon',
        // 'email',
        'kualifikasi_pendidikan',
        'id_prodi',
        'created_by',
        'edited_by',
        'id_user'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function prodi() {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function refNegara() {
        return $this->belongsTo(RefNegara::class, 'id_ref_negara', 'id');
    }
}
