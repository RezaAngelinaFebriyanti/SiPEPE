<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\LevelModel;

class AuthController extends Controller {
    public function login() {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request) {
        if($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register()
    {
        $levels = LevelModel::select('id', 'level_nama')->get();
        
        return view('auth.register')->with('levels', $levels);
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users,username',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5|confirmed',
            'id' => 'required|exists:levels,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed.',
                'msgField' => $validator->errors(),
            ]);
        }

        UserModel::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,
            'level_id' => $request->level_id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registration Success.',
            'redirect' => url('/login')
        ]);
    }
}