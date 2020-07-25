<?php

namespace App\Http\Controllers\Web\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = Owner::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->active = '2';
        $user->activation_token = null;
        $user->update();

        //Auth::guard('owner')->loginUsingId($user->id);
        return redirect()->route('owner.login')->with('success', 'Berhasil Aktivasi Email!, Sekarang anda sudah masuk!');
    }
}
