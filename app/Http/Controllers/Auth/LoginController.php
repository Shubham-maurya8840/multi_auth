<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated($request, $user)
    {
        // Check the user role and redirect accordingly
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');  // Admin dashboard
        }

        return redirect()->route('dashboard');  // User dashboard
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
