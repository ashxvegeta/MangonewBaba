<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function Register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ], [
            'password.confirmed' => 'The password and confirm password do not match.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'The confirm password field is required.',
            'password_confirmation.min' => 'The confirm password must be at least 8 characters.',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        
         return redirect()->intended(route('signin'))->with('success', 'Registration successful!');
    }

    public function Login(Request $request){
        $validator = Validator::make($request->all(),[
           'email'=>['required','string','email'],
            'password' => ['required', 'string'],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // get user email and user email and passwrod
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            $request->session()->flash('error','Please enter correct email or password');
            return redirect()->intended(route('signin'));
        }
        $request->session()->put('user', $user);
        if($user->role=='user'){
            return redirect('/');
        }else{
            return redirect()->route('admin.home');
        }
    }
}
