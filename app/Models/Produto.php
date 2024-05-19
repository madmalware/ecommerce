<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'slug', 
        'pequena_descricao', 
        'descricao', 
        'preco_regular', 
        'preco_venda', 
        'estoque_status', 
        'quantidade', 
        'image', 
        'categoria_id', 
        'marca_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
