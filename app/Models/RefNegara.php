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
}
