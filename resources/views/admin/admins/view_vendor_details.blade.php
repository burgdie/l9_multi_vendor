
@extends('admin.layout.layout')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Vendor Details</h3>
                <h6 class="font-weight-normal mb-0"><a href="{{url('admin/admins/vendor')  }}">Back to Vendors</a>   </h6>
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
      <div class="row">
          {{-- Start Display of Vendors Personal Information  --}}
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Personal information</h4>

                  <div class="form-group">
                    <label>Vendor Username/Email</label>
                    <input class="form-control" value="{{$vendorDetails['vendor_personal']['email'] }}" readonly="">
                  </div>
                  {{--  Start Input Element for Name --}}
                  <div class="form-group">
                    <label for="vendor_name">Name</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['name'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Name --}}

                  {{--  Start Input Element for Address --}}
                  <div class="form-group">
                    <label for="vendor_address">Address</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['address'] }}"readonly="">
                  </div>
                  {{--  End Input Element for Address --}}

                  {{--  Start Input Account Number --}}
                  <div class="form-group">
                    <label for="vendor_city">City</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['city'] }}" readonly="">
                  </div>
                  {{--  End Input Element for City --}}

                  {{--  Start Input Element State --}}
                  <div class="form-group">
                    <label for="vendor_state">State</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['state'] }}" readonly="">
                  </div>
                  {{--  End Input Element for State --}}

                  {{--  Start Input Element Country --}}
                  <div class="form-group">
                    <label for="vendor_country">Country</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['country'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Country --}}

                  {{--  Start Input Element PinCode --}}
                  <div class="form-group">
                    <label for="vendor_pincode">Pincode</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['pincode'] }}" readonly="">
                  </div>
                  {{--  End Input Element for PinCode --}}

                  <div class="form-group">
                    <label for="vendor_mobile">Mobile</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_personal']['mobile'] }}" readonly="">
                  </div>
                  <div class="form-group">
                    @if(!empty($vendorDetails['image']))
                      <label for="vendor_image">Photo</label>
                      <br>
                      <img style="width: 200px;" src="{{ url('admin/images/photos/'.$vendorDetails['image'])}}">
                    @endif
                  </div>


                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
          {{-- End Display of Vendors Personal Information   --}}

          {{-- Start Display of Vendors Business Information  --}}
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Business information</h4>

                  {{--  Start Input Element for Shop Name --}}
                  <div class="form-group">
                    <label for="vendor_name"> Shop Name</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_name'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Shop Name --}}

                  {{--  Start Input Element for Address --}}
                  <div class="form-group">
                    <label for="vendor_address"> Shop Address</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_address'] }}"readonly="">
                  </div>
                  {{--  End Input Element for Address --}}

                  {{--  Start Input City --}}
                  <div class="form-group">
                    <label for="vendor_city"> Shop City</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_city'] }}" readonly="">
                  </div>
                  {{--  End Input Element for City --}}

                  {{--  Start Input Element State --}}
                  <div class="form-group">
                    <label for="vendor_state">Shop State</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_state'] }}" readonly="">
                  </div>
                  {{--  End Input Element for State --}}

                  {{--  Start Input Element Country --}}
                  <div class="form-group">
                    <label for="vendor_country">Shop Country</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_country'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Country --}}

                  {{--  Start Input Element PinCode --}}
                  <div class="form-group">
                    <label for="vendor_pincode">Shop Pincode</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_pincode'] }}" readonly="">
                  </div>
                  {{--  End Input Element for PinCode --}}

                  {{-- Start Input Element Shop Mobile --}}
                  <div class="form-group">
                    <label for="vendor_mobile"> Shop Mobile</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_mobile'] }}" readonly="">
                  </div>

                  {{-- Start Input Element Shop Website --}}
                  <div class="form-group">
                    <label for="vendor_mobile"> Shop Website</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_website'] }}" readonly="">
                  </div>
                  {{-- End Input Element Shop Website --}}

                  {{-- Start Input Element Shop Email --}}
                  <div class="form-group">
                    <label for="vendor_mobile"> Shop Email</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_email'] }}" readonly="">
                  </div>

                  {{-- Start Input Element Address Proof --}}
                  <div class="form-group">
                    <label for="vendor_mobile">Address Proof</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['address_proof'] }}" readonly="">
                  </div>
                  {{-- End Input Element Address Proof  --}}

                  <div class="form-group">
                    @if(!empty($vendorDetails['vendor_business']['address_proof_image']))
                      <label for="vendor_image">Photo</label>
                      <br>
                      <img style="width: 200px;" src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image'])}}">
                    @endif
                  </div>
                   {{-- Start Input Element Business License Number--}}
                   <div class="form-group">
                    <label>Business License Number</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['business_license_number'] }}" readonly="">
                  </div>
                  {{-- End Input Element Business License Number--}}
                   {{-- Start Input Element GST Number --}}
                   <div class="form-group">
                    <label>GST Number</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['gst_number'] }}" readonly="">
                  </div>
                  {{-- End Input Element GST Number  --}}
                   {{-- Start Input Element PAN Number --}}
                   <div class="form-group">
                    <label>PAN Number</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['pan_number'] }}" readonly="">
                  </div>
                  {{-- End Input Element PAN Number  --}}

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
          {{-- End Display of Vendors Business Information    --}}

          {{-- Start Display of Vendors Bank Information  --}}
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Bank Information</h4>


                  {{--  Start Input Element for Account Holder Name --}}
                  <div class="form-group">
                    <label">Account Holder Name</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['account_holder_name'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Account Holder Name --}}

                  {{--  Start Input Element for Bank Name --}}
                  <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['bank_name'] }}"readonly="">
                  </div>
                  {{--  End Input Element for Bank Name --}}

                  {{--  Start Input Account Number --}}
                  <div class="form-group">
                    <label>Account Number</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['account_number'] }}" readonly="">
                  </div>
                  {{--  End Input Element for Account number --}}

                  {{--  Start Input Element Bank IFSC Code --}}
                  <div class="form-group">
                    <label>Bank IFSC Code</label>
                    <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['bank_ifsc_code'] }}" readonly="">
                  </div>
                  {{--  End Input Element for BAnk IFSC Code --}}


                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
          {{-- End Display of Vendors Bank Information  --}}

        </div>

    </div>
    @include('admin.layout.footer')
  </div>
@endsection
