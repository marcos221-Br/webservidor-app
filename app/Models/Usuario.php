<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;
    
    protected $fillable = [
        'oab',
        'nome',
        'senha',
    ];

    public function processos(){
        return $this->hasMany(Processo::class);
    }
}
