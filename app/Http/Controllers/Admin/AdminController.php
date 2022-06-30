<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Image;
// use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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

        //Check if File name of image to be uploaded is empty
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
        } else if(!empty($data['current_admin_image'])){
            // if not empty get selected image
            $imageName =$data['current_admin_image'];
          }else {
            //if empty provide empty string for image name
            $imageName = " ";
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

    public function updateVendorDetails($slug, Request $request) {
      if($slug =="personal"){

        if($request->isMethod('post')){
          $data = $request->all();
          //echo "<pre>"; print_r($data); die;

          $rules = [
            'vendor_name'  => 'required|regex:/^[\pL\s\-]+$/u',
            'vendor_city' => 'required|regex:/^[\pL\s\-]+$/u',
            'vendor_country' => 'required|regex:/^[\pL\s\-]+$/u',
            'vendor_address' => 'required',

            'vendor_mobile' => [
              'required',
              'numeric',
              Rule::phone()->detect()->country('DE',''),
            ],

          ];

          $customMessages = [
            'vendor_name.required' => 'Name is required',
            'vendor_name.regex' => 'Valid Name is required',
            'vendor_city.required' => 'City name is required',
            'vendor_city.regex' => 'Valid City name is required',
            'vendor_country.required' => 'Country name is required',
            'vendor_country.regex' => 'Valid Country name is required',
            'vendor_address.required' => 'Address is required',
            'vendor_mobile.required' => 'Mobile Number is required',
            'vendor_mobile.numeric' => 'Valid Mobile Number is required',
          ];

          $this->validate($request, $rules, $customMessages);

          //Upload Admin Photo
          //echo "<pre>"; print_r($data); die;

          //Check if File name of image to be uploaded is empty
          if($request->hasFile('vendor_image')){
            $image_tmp = $request->file('vendor_image');
            if($image_tmp->isValid()){
              //Get Image Extension
             $extension = $image_tmp->getClientOriginalExtension();
              //Get New Image Name
              $imageName = rand(111,99999).'.'.$extension;
              $imagePath = 'admin/images/photos/'.$imageName;
              //Upload the image
              Image::make($image_tmp)->save($imagePath);
            }
          } else if(!empty($data['current_vendor_image'])){
              // if not empty get selected image
              $imageName =$data['current_vendor_image'];
            }else {
              //if empty provide empty string for image name
              $imageName = " ";
          }

          //Update in admins table
          $user_id=Auth::guard('admin')->user()->id;
          // echo "<pre>"; print_r( $user_id); die;
          Admin::where('id',$user_id)->update([
            'name' => $data['vendor_name'],
            'mobile'=> $data['vendor_mobile'],
            'image' => $imageName
          ]);

          //Update in vendors table
          //echo "<pre>"; print_r($data); die;
          Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update([
            'name' => $data['vendor_name'],
            'mobile'=> $data['vendor_mobile'],
            'address'=> $data['vendor_address'],
            'city'=> $data['vendor_city'],
            'state'=> $data['vendor_state'],
            'country'=> $data['vendor_country'],
            'pincode'=> $data['vendor_pincode']
          ]);

          return redirect()->back()->with('success_message', 'Vendor details updated successfully!');
        }
        $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

      }else if($slug=="business"){

      }else if ($slug=="bank"){


      }
      return view('admin.settings.update_vendor_details')->with(compact('slug', 'vendorDetails'));


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
