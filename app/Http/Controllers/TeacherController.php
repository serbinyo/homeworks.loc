<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    protected $teacher;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->teacher = Auth::user();
                if (Auth::user()->role == 't') {
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
