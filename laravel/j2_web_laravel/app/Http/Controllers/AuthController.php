<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function processLogin(Request $request) {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
//                ->where('password', $request->get('password')
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                throw new \Exception("Invalid password");
            }

            // put: Đặt vào có rồi thì sẽ ghi đè lên
            // push:
            session()->put('id', $user->id);
            session()->put('avatar', $user->avatar);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect()->route('courses.index');
        } catch (\throwable $e) {
            return redirect()->route('login');
        }
    }

    public function logout() {
        session()->flush();

        return redirect()->route('login');
    }

    public function register() {
        return view('auth.register');
    }

    public function processRegister(Request $request) {
        User::query()
            ->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'level' => 0,
            ]);
    }
}
