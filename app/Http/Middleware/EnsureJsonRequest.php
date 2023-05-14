<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJsonRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    use ApiTrait;

    public function handle(Request $request, Closure $next): Response
    {

        if($request->header('Accept') !== "application/json"){

            return $this->errorResponse(['accept' => "application/json"] , "key is missed");

        }

        return $next($request);
    }
}
