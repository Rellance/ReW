@extends('admin.dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Order Details</h4>
                        <div class="page-title-right">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Shipping Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">
                                    <tbody>
                                        <tr>
                                            <th width="50%">Shiping Name:</th>
                                            <td>{{ $order->name }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shiping Phone:</th>
                                            <td>{{ $order->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shiping Email:</th>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Shiping Address:</th>
                                            <td>{{ $order->address }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Date:</th>
                                            <td>{{ $order->order_date }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order Details
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">
                                    <tbody>
                                        <tr>
                                            <th width="50%"> Name:</th>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"> Phone:</th>
                                            <td>{{ $order->user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"> Email:</th>
                                            <td>{{ $order->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"> Payment Type:</th>
                                            <td>{{ $order->payment_method }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Transaction Id:</th>
                                            <td>{{ $order->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Invoice:</th>
                                            <td class="text-danger">{{ $order->invoice_no }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Amount:</th>
                                            <td>${{ $order->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Order Status:</th>
                                            <td><span class="badge bg-info">{{ $order->status }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%"></th>
                                            <td>
                                                @if ($order->status == 'Pending')
                                                    <a href="{{ route('pending_to_confirm', $order->id) }}" class="btn btn-block btn-success" id="confirmOrder">Confirm Order</a>
                                                @elseif ($order->status == 'confirm')
                                                    <a href="{{ route('confirm_to_processing', $order->id) }}" class="btn btn-block btn-success" id="processingOrder">Processing Order</a>
                                                @elseif ($order->status == 'processing')
                                                    <a href="{{ route('processing_to_delivered', $order->id) }}" class="btn btn-block btn-success" id="deliveredOrder">Delivered Order</a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
                <div class="col-12">
                    <div class="col">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">
                                                <label>Image</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Product Name</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Restaurant Name</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Product Code</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Quantity</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>Price</label>
                                            </td>
                                        </tr>

                                        @foreach ($orderItems as $item)
                                            <tr>
                                                <td class="col-md-1">
                                                    <label>
                                                        <img src="{{ asset($item->product->image) }}"
                                                            style="width: 70px; height:40px;">
                                                    </label>
                                                </td>
                                                <td class="col-md-2">
                                                    <label>
                                                        {{ $item->product->name }}
                                                    </label>
                                                </td>
                                                @if ($item->client_id == null)
                                                    <td class="col-md-2">
                                                        <label>
                                                            <label>
                                                                Owner
                                                            </label>
                                                        </label>
                                                    </td>
                                                @else
                                                
                                                <td class="col-md-1">
                                                    <label>
                                                        {{ $item->product->client->name }}
                                                    </label>
                                                </td>
                                                @endif
                                                <td class="col-md-1">
                                                    <label>
                                                        {{ $item->product->code }}
                                                    </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>
                                                        {{ $item->qty }}
                                                    </label>
                                                </td>
                                                <td class="col-md-1">
                                                    <label>
                                                     {{ $item->price }} <br> Total = ${{ $item->price * $item->qty }}
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <h4>
                                        Total Price: ${{ $totalPrice }} <br>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
