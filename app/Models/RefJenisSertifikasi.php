<?php

namespace App\Models;

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
}
