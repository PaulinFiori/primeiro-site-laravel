<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $url = config('app.url') . $request->getRequestUri();
        
        LogAcesso::create(['log' => $ip. ' entrou na rota '. $url]);

        //$resposta = $next($request);
        //$resposta->setStatusCode(403, "Esqueçido");

        //dd($resposta);
        //return Response('Chegamos no middleware e finalizado no mesmo');
        return $next($request);
    }
}
