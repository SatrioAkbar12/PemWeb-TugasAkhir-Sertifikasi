<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';

    protected $primaryKey = 'id';

    public $incrementing = 'true';

    protected $fillable = [
        'nama',
        'fakultas',
        'created_by',
        'edited_by'
    ];

    public function asesi() {
        return $this->hasMany(Asesi::class, 'id_prodi', 'id');
    }

    public function asesor() {
        return $this->hasMany(Asesor::class, 'id_prodi', 'id');
    }
}
