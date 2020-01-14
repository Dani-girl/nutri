<?php

namespace App\Http\Middleware;

use Closure;

class CheckNutritionistOwn
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
        //nije gotovo - videcemom da li je potrebno
        if($request->user()){
            if($request->user()->id == auth()->user()->id){
                return $next($request);
            }    
        }
        return redirect('home');
    }
}
