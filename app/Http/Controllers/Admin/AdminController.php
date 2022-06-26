<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use App\Models\Admin;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
// use Intervention\Image\Facades\Image;

use Image;

class AdminController extends Controller
{

    public function dashboard() {
        return view('admin.dashboard');
    }

    // public function updateAdminDetails(Request $request){
    //   if($request->isMethod('post')) {
    //     $data = $request->all();
    //     echo "<pre>"; print_r($data); die;
    //     $rules = [
    //       'admin_name'  => 'required|regex:/^[\pL\s\-]+$/u',
    //       'admin_mobile' => [
    //         'required',
    //         'numeric',
    //         Rule::phone()->detect()->country('DE'),
    //       ],

    //     ];

    //     $customMessages = [
    //       'admin_name.required' => 'Name is required',
    //       'admin_name.regex' => 'Valid Name is required',
    //       'admin_mobile.required' => 'Mobile Number is required',
    //       'admin_mobile.numeric' => 'Valid Mobile Number is required'
    //     ];
    //     $this->validate($request, $rules, $customMessages);

    //     //Update Admin Detials
    //     Admin::where('id',Auth::guard('admin')->user()->id)->update([
    //       'name' => $data['admin_name'],
    //       'mobile'=> $data['admin_mobile'],
    //     ]);
    //     return redirect()->back()->with('success_message', 'Admin details updated successfully!');

    //   }
    //   return view('admin.settings.update_admin_details');

    // }

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

    public function updateAdminDetails(Request $request){
      if($request->isMethod('post')) {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $rules = [
          'admin_name'  => 'required|regex:/^[\pL\s\-]+$/u',
          'admin_mobile' => [
            'required',
            'numeric',
            Rule::phone()->detect()->country('DE'),
          ],

        ];

        $customMessages = [
          'admin_name.required' => 'Name is required',
          'admin_name.regex' => 'Valid Name is required',
          'admin_mobile.required' => 'Mobile Number is required',
          'admin_mobile.numeric' => 'Valid Mobile Number is required',
        ];

        $this->validate($request, $rules, $customMessages);

        //Upload Admin Photo
        //echo "<pre>"; print_r($data); die;

        if($request->hasFile('admin_image')){

          $image_tmp = $request->file('admin_image');
          if($image_tmp->isValid()){
            //Get Image Extension
           $extension = $image_tmp->getClientOriginalExtension();
            //Get New Image Name
            $imageName = rand(111,99999).'.'.$extension;
            $imagePath = 'admin/images/photos/'.$imageName;
            //Upload the image
            Image::make($image_tmp)->save($imagePath);
          }
        }

        //Update Admin Detials
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
          'name' => $data['admin_name'],
          'mobile'=> $data['admin_mobile'],
          'image' => $imageName
        ]);
        return redirect()->back()->with('success_message', 'Admin details updated successfully!');

      }
      return view('admin.settings.update_admin_details');

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
