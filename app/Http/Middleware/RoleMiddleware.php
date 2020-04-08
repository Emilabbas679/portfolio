<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }
        $roles = is_array($role)
            ? $role
            : explode('|', $role);
        if (!Auth::user()->hasAnyRole($roles)) {
            if(Auth::user()->hasRole('super-admin') or Auth::user()->hasRole('admin')){
                return $next($request);
            }else if(Auth::user()->hasRole('user')){
                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
