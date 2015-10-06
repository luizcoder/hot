<?php

namespace App\Http\Middleware;
use App\Hotsite;
use Closure;

class ValidHotsite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hotsite_apelido = $request->segment(1);
        $hotsite = Hotsite::where('apelido',$hotsite_apelido)->first();
        
        if($hotsite && $hotsite->count() > 0){
            return $next($request);
        }else{
            abort(404, 'O endereço requisitado não existe.');
        }
    }
}
