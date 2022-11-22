<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;
use App\Http\Services\ProdutoDetalheServiceInterface;
use App\Http\Services\ProdutoServiceInterface;
use App\Http\Services\UnidadeServiceInterface;

class ProdutoDetalheController extends Controller
{
    private $produtoDetalheService;
    private $produtoService;
    private $unidadeService;

    public function __construct(ProdutoDetalheServiceInterface $produtoDetalheService,
        ProdutoServiceInterface $produtoService,
        UnidadeServiceInterface $unidadeService) 
    {
        $this->produtoDetalheService = $produtoDetalheService;
        $this->produtoService = $produtoService;
        $this->unidadeService = $unidadeService;
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
    public function create()
    {
        $unidades = $this->unidadeService->getTodasUnidades();
        $produtos = $this->produtoService->getAllProdutos();

        return view('app.produto_detalhe.criar', ['unidades' => $unidades, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->produtoDetalheService->salvar($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe = $this->produtoDetalheService->getProdutoById($id);
        $unidades = $this->unidadeService->getTodasUnidades();
        $produtos = $this->produtoService->getAllProdutos();

        return view('app.produto_detalhe.editar', ['unidades' => $unidades, 'produtos' => $produtos, 'produto_detalhe' => $produtoDetalhe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $msg = $this->produtoDetalheService->update($request, $produtoDetalhe);

        $unidades = $this->unidadeService->getTodasUnidades();
        $produtos = $this->produtoService->getAllProdutos();

        return redirect()->route('produto-detalhe.edit', ['unidades' => $unidades, 'produtos' => $produtos, 'produto_detalhe' => $produtoDetalhe, 'msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
