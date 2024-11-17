<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('dashboard'); // Adjust 'dashboard' as needed.
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        $request->session()->regenerate();
        $user = Auth::user(); // Fetch the authenticated user
        $role = $user->role; // Adjust this depending on your setup (e.g., $user->role->name)
        // dd($role);
        // dd($request);
        if ($role == 'admin') {
            return redirect('/');
        }else{
            if ($request->email == 'vita1@gmail.com'){
                return redirect('/vita1Store');
            }elseif($request->email == 'vita2@gmail.com'){
                return redirect('/vita2Store');
            }elseif($request->email == 'vita3@gmail.com'){
                return redirect('/vita3Store');
            }elseif($request->email == 'vita4@gmail.com'){
                return redirect('/vita4Store');
            }elseif($request->email == 'vita5@gmail.com'){
                return redirect('/vita5Store');
            }elseif($request->email == 'vita6@gmail.com'){
                return redirect('/vita6Store');
            }elseif($request->email == 'vita7@gmail.com'){
                return redirect('/vita7Store');
            }elseif($request->email == 'vita8@gmail.com'){
                return redirect('/vita8Store');
            }elseif($request->email == 'vita9@gmail.com'){
                return redirect('/vita9Store');
            }elseif($request->email == 'vita10@gmail.com'){
                return redirect('/vita10Store');
            }elseif($request->email == 'vita11@gmail.com'){
                return redirect('/vita11Store');
            }elseif($request->email == 'vita12@gmail.com'){
                return redirect('/vita12Store');
            }elseif($request->email == 'vita13@gmail.com'){
                return redirect('/vita13Store');
            }elseif($request->email == 'vita14@gmail.com'){
                return redirect('/vita14Store');
            }elseif($request->email == 'vita15@gmail.com'){
                return redirect('/vita15Store');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
