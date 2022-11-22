<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe() {
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor() {
        return $this->hasOne('App\Models\Fornecedor', 'id', 'fornecedor_id');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Models\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}
