<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class DataController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('admin/home');
          }
        return redirect('admin/login');
    }

    public function register_view(){
        return view('admin/register');
    }   
    public function register(Request $request){
        $redata  = new User;
        $redata->name = $request['username'];
        $redata->email = $request['email'];
        $password = $request->password;
        $redata->password = Hash::make($password);
        $redata->save();    
        
        return redirect('admin/login')->with('status', 'Registration successful. Please log in.');
        
        if(Auth::attempt($request->only('email','password'))){
            return redirect('admin/home'); // Redirect to admin dashboard after successful login
        } 
    
    }
    
    
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }
}
