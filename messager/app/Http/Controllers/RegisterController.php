<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }
        $validateFields = $request->validate([
            'name'=>'required|min:2|max:15',
            'email'=>'required|email',
            'pass'=>'min:6|required_with:pass_conf|same:pass_conf',
            'pass_conf'=>'min:6'
        ]);
        if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('registration'))->withErrors(['email'=>'Такой пользователь уже зарегестрирован']);
        }
        $user = User::create([
            'name'=>$validateFields['name'],
            'email'=>$validateFields['email'],
            'password'=>bcrypt($validateFields['pass'])
        ]);
        if($user){
            Auth::login($user);
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors(['formError'=>'Ошибка при создании пользователя']);
    }
}
