<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'marca_id');
    }
}
