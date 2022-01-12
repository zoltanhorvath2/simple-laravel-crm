<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signInUser(Request $request){
        $userInfo = User::query()
            ->where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'Please enter correct email!');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedInUser', $userInfo->id);
                return redirect('main-page/main-page');
            }else{
                return back()->with('fail', 'Please enter correct password.');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedInUser')){
            session()->pull('LoggedInUser');
            return redirect('/');
        }else{
            return back();
        }
    }
}
