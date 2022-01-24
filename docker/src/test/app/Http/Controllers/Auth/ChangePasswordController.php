<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    //ログインしていない場合の処理
    public function __construct()
    {
        $this->middleware('auth');
    }

    // GET
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }
    
    // POST
    public function changePassword(ChangePasswordRequest $request)
    {
        //パスワード変更処理
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->route('Top')->with('status', __('Your password has been changed.'));
    }
}
