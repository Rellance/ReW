<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
 use Illuminate\Http\Request;
 use App\Models\Client;
 use App\Models\Menu;
 use App\Models\Gallery;
 use Carbon\Carbon;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Review;


class HomeController extends Controller
{
    public function RestaurantDetails($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Restaurant not found');
        }

        $menus = Menu::where('client_id', $client->id)
            ->with('products')
            ->get()
            ->filter(fn($menu) => $menu->products->isNotEmpty());

        $galleries = Gallery::where('client_id', $id)->get();

        $reviews = Review::where('client_id', $client->id)->where('status', 1)->get();
        $totalReviews = $reviews->count();
        $totalRating = $reviews->sum('rating');
        $averageRating = $totalReviews > 0 ? round($totalRating / $totalReviews, 1) : 0;

        $ratingCounts = [
            '5' => $reviews->where('rating', 5)->count(),
            '4' => $reviews->where('rating', 4)->count(),
            '3' => $reviews->where('rating', 3)->count(),
            '2' => $reviews->where('rating', 2)->count(),
            '1' => $reviews->where('rating', 1)->count(),
        ];
        $ratingPercentages = array_map(function ($count) use ($totalReviews) {
            return $totalReviews > 0 ? round(($count / $totalReviews) * 100, 2) : 0;
        }, $ratingCounts);

        return view('frontend.restaurant_details', compact('client', 'menus', 'galleries', 'reviews', 'totalReviews', 'averageRating', 'ratingCounts', 'ratingPercentages'));
    }

    public function AddFavourite(Request $request, $id){
        if (Auth::check()) {
            $exists = Favourite::where('user_id', Auth::id())->where('client_id', $id)->exists();
            if (!$exists ) {
                Favourite::insert([
                    'user_id'=> Auth::id(),
                    'client_id' => $id,
                ]);
                return response()->json(['success' => 'Your wishlist added successfully']);
            } else {
                return response()->json(['error' => 'This product is already in your wishlist']);
            } 
        }else{
            return response()->json(['error' => 'Please log in to your account first']);
        }

    }
    //End Method
    public function AllFavourites(){
        $favourites = Favourite::where('user_id', Auth::id())->latest()->get();
        return view('frontend.dashboard.all_favourites', compact('favourites'));
    }
    //End Method
    public function RemoveFavourites($id){
        Favourite::find($id)->delete();
    $notification = array(
        'message' => 'Your Wishlist Removed Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
    }
    //End Method
}
