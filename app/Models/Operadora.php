<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
    use HasFactory;

    protected $fillable = [
        'operadora',
        'descricao',
        'status',
    ];

    protected $table = "operadoras";


}
