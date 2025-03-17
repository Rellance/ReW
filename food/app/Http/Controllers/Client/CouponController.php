<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function AllCoupon()
    {
        $id = Auth::guard('client')->id();
        $coupon = Coupon::where('client_id', $id)->orderBy('id', 'desc')->get();
        return view('client.backend.coupon.all_coupon', compact('coupon'));
    }
    // End Method

    public function AddCoupon()
    {

        return view('client.backend.coupon.add_coupon');
    }
    // End Method 

    public function StoreCoupon(Request $request)
    {


        Coupon::create([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_desc' => $request->coupon_desc,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'client_id' => Auth::guard('client')->id(),
            'created_at' => Carbon::now()

        ]);


        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.coupon')->with($notification);
    }
    // End Method 

    public function EditCoupon($id)
    {
        $coupon = Coupon::find($id);
        return view('client.backend.coupon.edit_coupon', compact('coupon'));
    }

    // End Method

    public function UpdateCoupon(Request $request)
    {
        Coupon::find($request->id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_desc' => $request->coupon_desc,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'client_id' => Auth::guard('client')->id(),
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.coupon')->with($notification);
    }
    // End Method

    public function DeleteCoupon($id)
    {
        Coupon::find($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

}
