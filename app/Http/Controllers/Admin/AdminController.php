<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function login(Request $request){

        if($request->isMethod('post')){
            // dd($request);

            $data = $request->all();
            // echo "<pre>";print_r($data); die;

            // $validated = $request->validate([
            //     'email' =>'required|email|max:255',
            //     'password' => 'required',
            // ]);

            $rules = [
                'email' =>'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
               //Add Custom Message  here

               'email.required' => 'Email wird benötigt',
               'email.email' => 'Email benötigt das korrekete EMail Format',
               'password.required' => 'Passwort wird benötigt',
            ];

            $this->validate($request,$rules, $customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],
            'status'=> 1])){
                return redirect('admin/dashboard');
            } else{
                return redirect()->back()->with('error_message', 'Invalid Credentials');
            }
        }
        return view('admin.login');
    }

    public function logout(){
       Auth::guard('admin')->logout();
       return redirect('admin/login');
    }
}
