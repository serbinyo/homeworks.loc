<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $schoolkid;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->schoolkid = Auth::user();
                if (Auth::user()->role == 's') {
                    return $next($request);
                } else {
                    return redirect('/');
                }
            } else {
                return redirect('login');
            }

        });
    }
}
