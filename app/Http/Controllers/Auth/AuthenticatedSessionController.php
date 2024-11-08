<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $notification = [
            'message' => 'Welcome back!',
            'alert-type' => 'success'
        ];
        try{
            $request->authenticate();
        }catch (\Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $request->session()->regenerate();

        return redirect(route('user.notes'))->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
