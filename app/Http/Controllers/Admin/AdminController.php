<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Hash;

class AdminController extends Controller
{

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request){
      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        //Back-end check if current password entered by admin is correct
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
          //Check if new password is matching with confirm password
          if($data['confirm_password']== $data['new_password']){
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
            return redirect()->back()->with('success_message','Password Update Successful');

          }else{
            return redirect()->back()->with('error_message','New Password and Confirm Password does not match');
          }

        }else {
          return redirect()->back()->with('error_message', 'Your current password is Incorrect!' );
        }

      }

      //  echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
       $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request) {
      $data = $request->all();
      // echo "<pre>"; print_r($data); die;
      if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
        return "true";
      }else {
        return  "false";
      }
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
