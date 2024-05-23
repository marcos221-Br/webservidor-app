<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorario extends Model {
    use HasFactory;

    protected $fillable = [
        'honorario',
        'parcelas',
        'idprocesso',
    ];

    public function processo(){
        return $this->hasOne(Processo::class);
    }
}
