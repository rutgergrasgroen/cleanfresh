<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\RedirectResponse;

class isAjax implements Middleware {

    public function handle($request, Closure $next)
    {
        if ($request->ajax()){
            return $next($request);
        }else{
            return new RedirectResponse(url('/'));
        }

    }
}
