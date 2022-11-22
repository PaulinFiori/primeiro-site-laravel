<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Services\ProdutoServiceInterface;
use App\Http\Services\UnidadeServiceInterface;
use App\Http\Services\ProdutoDetalheServiceInterface;
use App\Http\Services\FornecedoresServiceInterface;

class ProdutoController extends Controller
{
    private $produtoService;
    private $unidadeService;
    private $produtoDetalheService;
    private $fornecedoresService;

    public function __construct(ProdutoServiceInterface $produtoService,
        UnidadeServiceInterface $unidadeService,
        ProdutoDetalheServiceInterface $produtoDetalheService,
        FornecedoresServiceInterface $fornecedoresService) 
    {
        $this->produtoService = $produtoService;
        $this->unidadeService = $unidadeService;
        $this->produtoDetalheService = $produtoDetalheService;
        $this->fornecedoresService = $fornecedoresService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = $this->produtoService->listar();

        return view('app.produtos.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = $this->unidadeService->getTodasUnidades();
        $fornecedores = $this->fornecedoresService->getAllFornecedores();

        return view('app.produtos.criar', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = $this->produtoService->salvar($request);

        $unidades = $this->unidadeService->getTodasUnidades();

        return view('app.produtos.criar', ['unidades' => $unidades, 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        $unidade = $this->unidadeService->getUnidadeByProduto($produto->id);

        return view('app.produtos.mostra', ['produto' => $produto, 'unidade' => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = $this->unidadeService->getTodasUnidades();
        $fornecedores = $this->fornecedoresService->getAllFornecedores();

        return view('app.produtos.editar', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $msg = $this->produtoService->update($request, $produto);

        return redirect()->route("produto.index")->with(['msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        $this->produtoService->deletar($produto);

        return redirect()->route("produto.index", ['msg' => "Deletado com sucesso"]);
    }
}
