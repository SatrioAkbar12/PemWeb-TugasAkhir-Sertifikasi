<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefNegara extends Model
{
    use HasFactory;

    protected $table = 'ref_negara';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama'
    ];

    public function asesi() {
        return $this->hasMany(Asesi::class, 'id_ref_negara', 'id');
    }

    public function asesor() {
        return $this->hasMany(Asesor::class, 'id_ref_negara', 'id');
    }
}
