<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class CartCountMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->count();

            $cart = Cart::with(['book_cart'])->where('user_id', Auth::id())
            ->limit(3)
            ->get();
            View::share('cartData', $cart);
            View::share('cartCount', $cartCount); // Berbagi ke semua view Blade
        }

        return $next($request);
    }
}
