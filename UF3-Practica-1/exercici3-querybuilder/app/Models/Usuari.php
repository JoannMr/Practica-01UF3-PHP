<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;

    protected $fillable = ['nom']; // <-- Añade esta línea

    public function comandas()
    {
        return $this->hasMany(Comanda::class);
    }
}
