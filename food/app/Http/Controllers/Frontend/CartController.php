<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;


class CartController extends Controller
{
    public function AddToCart($id)
    {
        if (session::has('coupon')) {
            session::forget('coupon');
        }

        $products = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $priceToShow = isset($products->discount_price) ? $products->discount_price : $products->price;
            $cart[$id] = [
                "id" => $id,
                "name" => $products->name,
                "price" => $priceToShow,
                "image" => $products->image,
                "client_id" => $products->client_id,
                "quantity" => 1,
            ];
        }
        session()->put('cart', $cart);
        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Cart updated successfully', 'alert-type' => 'success']);
    }
    public function RemoveCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Cart removed successfully', 'alert-type' => 'success']);
    }

    public function ApplyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('validity','>=',Carbon::now()->format('Y-m-d'))->first();
 
         $cart = session()->get('cart',[]);
         $totalAmount = 0;
         $clientIds = [];
 
         foreach($cart as $car){
             $totalAmount += ($car['price'] * $car['quantity']);
             $pd = Product::find($car['id']);
             $cdid = $pd->client_id;
             array_push($clientIds,$cdid);
         }
 
         if ($coupon) {
            if (count(array_unique($clientIds)) === 1) {
              $cvendorId = $coupon->client_id;
 
              if ($cvendorId == $clientIds[0]) {
                 Session::put('coupon',[
                     'coupon_name' => $coupon->coupon_name,
                     'discount' => $coupon->discount,
                     'discount_amount' => ($totalAmount * $coupon->discount / 100),
                 ]);
                 $couponData = session()->get('coupon');
 
                 return response()->json(array(
                     'validity' => true,
                     'success' => 'Coupon Applied Successfully',
                     'couponData' => $couponData,
                 ));
              }else{
                 return response()->json(['error' => 'This Coupon Not Valid for this Restrurant']);
              } 
 
            }else{
             return response()->json(['error' => 'This Coupon for one of the selected Restrurant']);
            }
         }else {
             return response()->json(['error' => 'Invalid Coupon']);
         }
    }

    public function RemoveCoupon()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon removed successfully']);
    }
    
    public function Checkout() {
        if (Auth::check()) {
            $cart = session()->get('cart', []);
            $totalAmount = 0;
    
            foreach ($cart as $car) {
                $price = isset($car['price']) && is_numeric(str_replace(',', '.', $car['price']))
                    ? (float) str_replace(',', '.', $car['price'])
                    : 0;
    
                $totalAmount += $price;
            }
    
            if ($totalAmount > 0) {
                return view('frontend.checkout.view_checkout', compact('cart'));
            } else {
                $notification = [
                    'message' => 'Shopping Cart is Empty',
                    'alert-type' => 'error'
                ];
                return redirect()->to('/')->with($notification);
            }
    
        } else {
            $notification = [
                'message' => 'Please Login First',
                'alert-type' => 'error'
            ];
            return redirect()->route('login')->with($notification);
        }
    }
    
}
