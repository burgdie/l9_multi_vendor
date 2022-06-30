
@extends('admin.layout.layout')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Update Vendor Details</h3>
                {{-- <h6 class="font-weight-normal mb-0">Update Admin Details</h6> --}}
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">January - March</a>
                    <a class="dropdown-item" href="#">March - June</a>
                    <a class="dropdown-item" href="#">June - August</a>
                    <a class="dropdown-item" href="#">August - November</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if($slug=="personal")
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Personal information</h4>
                {{-- Add  panel for  error/success messages --}}
                {{-- Error Case --}}
                @if(Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                  {{-- Success Case --}}
                @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                {{-- End add  panel for  error messages --}}

                <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post"
                  name="" id="" enctype="multipart/form-data"
                >
                  @csrf
                  <div class="form-group">
                    <label>Vendor Username/Email</label>
                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                  </div>
                  {{--  Start Input Element for Name --}}
                  <div class="form-group">
                    <label for="vendor_name">Name</label>
                    <input type="text" class="form-control" id="vendor_name" placeholder="Enter Your Name" name="vendor_name" value="{{  Auth::guard('admin')->user()->name }}" required="">
                  </div>
                  {{--  End Input Element for Name --}}

                  {{--  Start Input Element for Address --}}
                  <div class="form-group">
                    <label for="vendor_address">Address</label>
                    <input type="text" class="form-control" id="vendor_address" placeholder="Enter Your Address" name="vendor_address" value="{{$vendorDetails['address'] }}" required="">
                  </div>
                  {{--  End Input Element for Address --}}

                  {{--  Start Input Element City --}}
                  <div class="form-group">
                    <label for="vendor_city">City</label>
                    <input type="text" class="form-control" id="vendor_city" placeholder="Enter Your City" name="vendor_city" value="{{$vendorDetails['city'] }}" required="">
                  </div>
                  {{--  End Input Element for City --}}

                  {{--  Start Input Element State --}}
                  <div class="form-group">
                    <label for="vendor_state">State</label>
                    <input type="text" class="form-control" id="vendor_state" placeholder="Enter Your State" name="vendor_state" value="{{ $vendorDetails['state']  }}" required="">
                  </div>
                  {{--  End Input Element for State --}}

                  {{--  Start Input Element Country --}}
                  <div class="form-group">
                    <label for="vendor_country">Country</label>
                    <input type="text" class="form-control" id="vendor_country" placeholder="Enter Your country" name="vendor_country" value="{{ $vendorDetails['country'] }}" required="">
                  </div>
                  {{--  End Input Element for Country --}}

                  {{--  Start Input Element PinCode --}}
                  <div class="form-group">
                    <label for="vendor_pincode">Pincode</label>
                    <input type="text" class="form-control" id="vendor_pincode" placeholder="Enter Your pincode" name="vendor_pincode" value="{{ $vendorDetails['pincode'] }}" required="">
                  </div>
                  {{--  End Input Element for PinCode --}}

                  <div class="form-group">
                    <label for="vendor_mobile">Mobile</label>
                    <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile" placeholder="Enter the Mobile Number" value="{{  Auth::guard('admin')->user()->mobile }}"required="" maxlength="13">
                  </div>
                  <div class="form-group">
                    <label for="vendor_image">Photo</label>
                    <input type="file" class="form-control" name="vendor_image" id="vendor_image">
                    @if(!empty(Auth::guard('admin')->user()->image))
                      <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Image </a>
                      <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                    @endif
                  </div>


                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>

        </div>
       }@elseif($slug=="business")


      @elseif($slug=="bank")

      @endif

    </div>
    @include('admin.layout.footer')
  </div>
@endsection
