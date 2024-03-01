<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunioe extends Model
{
    use HasFactory;

    protected $fillable = [
        'assunto',
        'data',
        'horario',
        'local',
        
    ];
}
