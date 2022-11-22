<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

use App\Http\Controllers\TesteController;

Route::controller(PrincipalController::class)->group(function(){
    Route::middleware('log.acesso')->get('/', 'principal')->name("site.index");
});

Route::controller(SobreNosController::class)->group(function(){
    Route::middleware('log.acesso')->get('/sobre-nos', 'sobrenos')->name("site.sobrenos");
});

Route::controller(ContatoController::class)->group(function(){
    Route::get('/contato', 'getContatos')->name("site.contato");
    Route::post('/contato', 'salvarContatos')->name("site.salvarContatos");

    /*
    Route::get('/contato/{nome}/{categoria_id}/{assunto?}/{mensagem?}', function(
            string $nome, 
            int $categoria_id = 1,  // 1- informação
            string $assunto = "assunto", 
            string $mensagem = "mensagem não informada"
        ) {
        echo "Nome: $nome <br> Id Categoria: $categoria_id <br> Assunto: $assunto <br> Mensagem: $mensagem";
    })->where(['nome' => '[A-Za-z]+', 'categoria_id' => '[0-9]+']);
    */
});

Route::controller(LoginController::class)->group(function(){
    Route::middleware('log.acesso')->get('/login/{erro?}', 'index')->name("site.login");
    Route::post('/login', 'fazerLogin')->name("site.login");
});

Route::middleware('autenticacao:ldap,Paulo', 'log.acesso')->prefix('app')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/home', 'index')->name("app.home");
    });

    Route::controller(LoginController::class)->group(function(){
        Route::get('/sair', 'sair' )->name("app.sair");
    });

    Route::controller(FornecedoresController::class)->group(function(){
        Route::get('/fornecedor', 'index')->name("app.fornecedor");

        Route::get('/fornecedor/novo', 'novo')->name("app.fornecedor.novo");
        Route::post('/fornecedor/novo', 'novo')->name("app.fornecedor.novo");
        
        Route::get('/fornecedor/listar', 'listar')->name("app.fornecedor.listar");
        Route::post('/fornecedor/listar', 'listar')->name("app.fornecedor.listar");

        Route::get('/fornecedor/editar', 'editar')->name("app.fornecedor.editar");
        Route::post('/fornecedor/editar', 'update')->name("app.fornecedor.editar");

        Route::get('/fornecedor/deletar', 'deletar')->name("app.fornecedor.deletar");
        Route::post('/fornecedor/deletar', 'deletar')->name("app.fornecedor.deletar");
    });

    Route::controller(ProdutoController::class)->group(function(){
        //Route::get('/produto/{msg?}', 'index')->name("app.produto");

        //Route::get('/produto/criar', 'create')->name("app.produto.criar");
    });

    Route::resource('produto', ProdutoController::class);

    Route::resource('cliente', ClienteController::class);

    Route::resource('pedido', PedidoController::class);

    //Route::resource('pedido-produto', PedidoProdutoController::class);

    Route::controller(PedidoProdutoController::class)->group(function() {
        Route::get('pedido-produto/create/{pedido}', 'create')->name('pedido-produto.create');
        Route::post('pedido-produto/store/{pedido}', 'store')->name('pedido-produto.store');
        Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', 'destroy')->name('pedido-produto.destroy');
    });
});


Route::controller(TesteController::class)->group(function(){
    Route::middleware('log.acesso')->get('/teste/{p1}/{p2}', 'teste')->name("site.teste");
});

Route::fallback(function () {
    echo 'A rota acessada não é válida. <a href="' . route('site.index') . '">Clique aqui</a> para voltar á página inicial.';
});