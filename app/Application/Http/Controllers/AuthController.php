<?php

namespace App\Application\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller {
    public function login() : View {
        return View('Auth.login');
    }

    public function register() : View {
        return View('Auth.register');
    }

    public function logout() : RedirectResponse {
        return redirect()->route('home')->with('success', 'You have been logged out.');
    }

    public function forgotPassword() : View {
        return View('Auth.forgot');
    }

    public function resetPassword() : View {
        return View('Auth.reset');
    }

    public function verifyEmail() : View {}

    public function resendEmailVerification() : View {}

    public function confirmEmail() : View {}

}
