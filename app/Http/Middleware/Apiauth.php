<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Apiauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		$token =$request->header("Auth_Key");
		if($token !='' || $token !="ABCDEF" ){
			return response()->json(["message"=>"failed"],401);
		}
        return $next($request);
    }
}
