<?php

namespace App\Models;

// use App\Models\Vendor;
// use App\Models\VendorsBankDetail;
// use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard ='admin';

    public function vendorPersonal(){
      return $this->belongsTo('App\Models\Vendor', 'vendor_id');
    }
    public function vendorBusiness(){
      return $this->belongsTo('App\Models\VendorsBusinessDetail', 'vendor_id');
    }
    public function vendorBank(){
      return $this->belongsTo('App\Models\VendorsBankDetail', 'vendor_id');
    }
}
