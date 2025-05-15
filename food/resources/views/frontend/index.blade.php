@extends('frontend.master')
@section('content')
    <section class="section pt-5 pb-5 products-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Popular Restaurants</h2>
                <p>Top restaurants, cafes, pubs, and bars, based on trends</p>
                <span class="line"></span>
            </div>
            <div class="row">

                @php
                    $clients = App\Models\Client::latest()->where('status', '1')->get();
                @endphp

                @foreach ($clients as $item)
                    @php
                        $products = App\Models\Product::where('client_id', $item->id)->limit(3)->get();
                        $menuNames = $products->map(function ($product) {
                                return $product->Menu ? $product->Menu->menu_name : 'No Menu';
                            })->toArray();
                            
                            
                        $menuNamesString = implode(' • ', $menuNames);
                        $coupons = App\Models\Coupon::latest()
                            ->where('client_id', $item->id)
                            ->where('status', '1')
                            ->first();
                    
                    $reviewsCount = App\Models\Review::where('client_id', $item->id)->where('status', '1')->latest()->get();
                    $averageRating = App\Models\Review::where('client_id', $item->id)->where('status', '1')->avg('rating');
                    @endphp

                    <div class="col-md-3">
                        <div class="item pb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success"><i
                                                class="icofont-star"></i> {{ number_format($averageRating, 1) }} ({{ count($reviewsCount) }}+)</span></div>
                                    <div class="favourite-heart text-danger position-absolute"><a aria-label="Add to Wishlist" onclick="addFavourite({{$item->id}})">
                                        <i class="icofont-heart"></i>
                                    </a></div>
                                    @if ($coupons)                                              
                                    <div class="member-plan position-absolute"><span
                                            class="badge badge-dark">Promoted</span></div>
                                    @else
                                    @endif        
                                    <a href="{{ route('res.detail', $item->id) }}">
                                        <img src="{{ asset('upload/client_images/' . $item->photo) }}"
                                            class="img-fluid item-img" style="width: 300px; height: 250px;">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1"><a href="{{ route('res.detail', $item->id) }}" class="text-black">{{ $item->name }}</a>
                                        </h6>
                                        <p class="text-gray mb-3">{{$menuNamesString}}</p>
                                        <p class="text-gray mb-3 time"><span
                                                class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i
                                                    class="icofont-wall-clock"></i> 20–25 min</span></p>
                                    </div>
                                    <div class="list-card-badge">
                                        @if ($coupons)
                                            <span class="badge badge-success">OFFER</span>
                                            <small>{{ $coupons->discount }}% off | Use Coupon {{ $coupons->coupon_name}}</small>                                               
                                        @else
                                            <span class="badge badge-success">OFFER</span>
                                            <small>No Coupon Available</small>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
