<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model {
    use HasFactory;

    protected $fillable = [
        'numeroprocesso',
        'descricao',
        'escritorio',
        'proximoprazo',
        'idusuario',
    ];

    public function honorarios() {
        return $this->hasMany(Honorario::class);
    }

    public function usuarios() {
        return $this->hasOne(Usuario::class);
    }
}
