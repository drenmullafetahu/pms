<?php
/**
 * Created by PhpStorm.
 * User: dramd
 * Date: 12/25/2016
 * Time: 5:45 AM
 */

namespace app\Http\Middleware;

use Closure;

class CheckUserSession
{

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            return redirect('/');
        }

        return $next($request);
    }

}