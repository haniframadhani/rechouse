<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordValidation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index()
    {
    }

    /**
     * setting
     *
     * @return View
     */
    public function setting(): View
    {
        return view('setting');
    }

    /**
     * login
     *
     * @return View
     */
    public function login(): View
    {
        return view('login');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function loginPost(Request $request): RedirectResponse
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credential)) {
            return redirect()->route('registrations.index')->with(['login' => 'login berhasil']);
        }
        return back()->with('error', 'email atau password salah');
    }

    /**
     * logout
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }


    /**
     * changePassword
     *
     * @return RedirectResponse
     */
    public function changePassword(Request $request): RedirectResponse
    {
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'password salah');
        }

        if ($request->new_password != $request->re_new_password) {
            return back()->with('error', 'password baru tidak sesuai');
        }
        $request->validate([
            'new_password' => ["required", "min:8", new PasswordValidation()]
        ], [
            'new_password.min' => 'minimal 8 karakter'
        ]);

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password, [
                'rounds' => 10,
            ])
        ]);

        return redirect()->route('registrations.index')->with(['success' => 'password berhasil diubah']);
    }
}