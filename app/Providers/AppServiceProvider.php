<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Http\Services\ContatoService;
use App\Http\Services\ContatoServiceInterface;
use App\Http\Services\MotivoContatoService;
use App\Http\Services\MotivoContatoServiceInterface;
use App\Http\Services\LoginService;
use App\Http\Services\LoginServiceInterface;
use App\Http\Services\FornecedoresService;
use App\Http\Services\FornecedoresServiceInterface;
use App\Http\Services\ProdutoService;
use App\Http\Services\ProdutoServiceInterface;
use App\Http\Services\ClienteService;
use App\Http\Services\ClienteServiceInterface;
use App\Http\Services\UnidadeService;
use App\Http\Services\UnidadeServiceInterface;
use App\Http\Services\ProdutoDetalheService;
use App\Http\Services\ProdutoDetalheServiceInterface;
use App\Http\Services\PedidoService;
use App\Http\Services\PedidoServiceInterface;
use App\Http\Services\PedidoProdutoService;
use App\Http\Services\PedidoProdutoServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContatoServiceInterface::class, ContatoService::class);
        $this->app->bind(MotivoContatoServiceInterface::class, MotivoContatoService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(FornecedoresServiceInterface::class, FornecedoresService::class);
        $this->app->bind(ProdutoServiceInterface::class, ProdutoService::class);
        $this->app->bind(ClienteServiceInterface::class, ClienteService::class);
        $this->app->bind(UnidadeServiceInterface::class, UnidadeService::class);
        $this->app->bind(ProdutoDetalheServiceInterface::class, ProdutoDetalheService::class);
        $this->app->bind(PedidoServiceInterface::class, PedidoService::class);
        $this->app->bind(PedidoProdutoServiceInterface::class, PedidoProdutoService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
