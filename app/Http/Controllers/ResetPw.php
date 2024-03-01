<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPw extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('/')->with(['forgot-pw' => true]);
    }

}
