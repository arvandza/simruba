<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:3'
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return $this->redirectToRole();
            }

            toastr()->error('Email atau Password yang anda masukkan salah');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->route('login');
        }
    }

    protected function redirectToRole()
    {
        try {
            $user = Auth::user();

            if ($user->role->name === 'mahasiswa') {
                return redirect()->route('rooms.available');
            } else if ($user->role->name === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            toastr()->error('Anda tidak memiliki hak akses');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
