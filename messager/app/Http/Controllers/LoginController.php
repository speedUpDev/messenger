<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\email;
use function Webmozart\Assert\Tests\StaticAnalysis\readable;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        $validateFields = $request->only(['email','password']);
        if(Auth::attempt($validateFields)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->withErrors(['email'=>'Ошибка входа']);
    }
}
