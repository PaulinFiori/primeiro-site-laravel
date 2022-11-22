<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Http\Services\PedidoServiceInterface;
use App\Http\Services\ClienteServiceInterface;
use App\Http\Services\PedidoProdutoServiceInterface;
use App\Http\Services\ProdutoServiceInterface;

class PedidoProdutoController extends Controller
{
    private $pedidoService;
    private $clientesService;
    private $pedidoProdutoService;
    private $produtoService;

    public function __construct(PedidoServiceInterface  $pedidoService,
        ClienteServiceInterface $clientesService,
        PedidoProdutoServiceInterface $pedidoProdutoService,
        ProdutoServiceInterface  $produtoService)
    {
        $this->pedidoService = $pedidoService;
        $this->clientesService = $clientesService;
        $this->pedidoProdutoService = $pedidoProdutoService;
        $this->produtoService = $produtoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = $this->produtoService->getAllProdutos();
        //$pedido->produtos; //eager loading

        return view('app.pedidos_produto.criar', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $msg = $this->pedidoProdutoService->salvar($request, $pedido);

        return redirect()->route("pedido-produto.create", ["msg" => $msg, "pedido" => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        $msg = $this->pedidoProdutoService->deletar($pedidoProduto);

        return redirect()->route("pedido-produto.create", ["msg" => $msg, "pedido" => $pedido_id]);
    }
}
