<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Product; 
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Review;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){
        $client = $request->client_id;

        $request->validate([
            'comment' => 'required'
        ]);

        Review::insert([
            'client_id' => $client,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Review Will Approlve By Admin',
            'alert-type' => 'success'
        );

        $previousUrl = $request->headers->get('referer');
        $redirectUrl = $previousUrl ? $previousUrl . '#pills-reviews' : route('res.detail', ['id' => $client]) . '#pills-reviews';
        return redirect()->to($redirectUrl)->with($notification);

    }
    // End Method 

    public function AdminPendingReview(){
        $reviews = Review::where('status', 0)->orderBy('id','desc')->get();
        return view('admin.backend.reviews.pending_review', compact('reviews'));
    }

    public function AdminApproveReview(){
        $reviews = Review::where('status', 1)->orderBy('id','desc')->get();
        return view('admin.backend.reviews.approve_review', compact('reviews'));
    }

    public function ReviewChangeStatus(Request $request)
     {
         $reviews = Review::find($request->review_id);
     
         if (!$reviews) {
             return response()->json(['error' => 'Review not found'], 404);
         }
     
         $reviews->status = $request->status;
         $reviews->save();
     
         return response()->json(['success' => 'Status changed successfully']);
     }
    // End Method 
    
    public function ClientAllReviews(){
        $client = Auth::guard('client')->id();
        $reviews = Review::where('client_id', $client)->where('status', 1)->orderBy('id','desc')->get();
        return view('client.backend.reviews.all_reviews', compact('reviews'));
    }
}