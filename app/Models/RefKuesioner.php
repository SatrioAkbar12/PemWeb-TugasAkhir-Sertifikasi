<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKuesioner extends Model
{
    use HasFactory;


    protected $table = 'ref_kuesioner';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'pertanyaan',
        'is_aktif'
    ];

    public function pendaftarKuesioner() {
        return $this->hasMany(PendaftarKuesioner::class, 'id_kuesioner', 'id');
    }
}
