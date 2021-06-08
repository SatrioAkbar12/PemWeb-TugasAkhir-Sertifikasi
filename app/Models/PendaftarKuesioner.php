<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarKuesioner extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_kuesioner';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'id_pendaftar',
        'id_kuesioner',
        'jawaban',
        'created_by',
        'edited_by'
    ];

    public function pendaftar() {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }

    public function refKuesioner() {
        return $this->belongsTo(RefKuesioner::class, 'id_kuesioner', 'id');
    }
}
