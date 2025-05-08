<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class ManageOrderController extends Controller
{
    public function PendingOrder()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.backend.order.pending_order', compact('orders'));
    }

    public function ConfirmOrder()
    {
        $orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('admin.backend.order.confirm_order', compact('orders'));
    }
    public function ProcessingOrder()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('admin.backend.order.processing_order', compact('orders'));
    }
    public function DeliveredOrder()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('admin.backend.order.delivered_order', compact('orders'));
    }

    public function OrderDetails($id)
    {
        $order = Order::with('user')->where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        $totalPrice = 0;

        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        return view('admin.backend.order.admin_order_details', compact('order', 'orderItems', 'totalPrice'));
    }

    public function PendingToConfirm($id)
    {
        Order::where('id', $id)->update(['status' => 'confirm']);
        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function ConfirmToProcessing($id)
    {
        Order::where('id', $id)->update(['status' => 'processing']);
        $notification = array(
            'message' => 'Order moved to Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProcessingToDelivered($id)
    {
        Order::where('id', $id)->update(['status' => 'delivered']);
        $notification = array(
            'message' => 'Order moved to Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllClientOrders()
    {
        $clientId = Auth::guard('client')->id();
        $orderItemGroupData = OrderItem::with('product', 'order')
            ->where('client_id', $clientId)->orderBy('id', 'DESC')
            ->get()
            ->groupBy('order_id');
        return view('client.backend.order.all_orders', compact('orderItemGroupData'));
    }

    public function ClientOrderDetails($id)
    {
        $clientId = Auth::guard('client')->id();
        $order = Order::with('user')->where('id', $id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->where('client_id',$clientId)->orderBy('id', 'DESC')->get();

        $totalPrice = 0;

        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        return view('client.backend.order.client_order_details', compact('order', 'orderItems', 'totalPrice'));
    }

    public function UserOrderList()
    {
        $userId = Auth::user()->id;
        $userOrders = Order::where('user_id', $userId)->orderBy('id', 'DESC')->get();
        return view('frontend.dashboard.order.user_order_list', compact('userOrders'));
    }

    public function UserOrderDetails($id)
    {
        $order = Order::with('user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        $totalPrice = 0;

        foreach ($orderItems as $item) {
            $price = $item->price ?? 0; // Если $item->price равно null, используем 0
            $qty = $item->qty ?? 0;     // Если $item->qty равно null, используем 0
    
            $totalPrice += (float) $price * (int) $qty;
        }

        return view('frontend.dashboard.order.user_order_details', compact('order', 'orderItems', 'totalPrice'));
    }
    public function UserInvoiceDownload($id)
    {
        $order = Order::with('user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        $totalPrice = 0;

        foreach ($orderItems as $item) {
            $totalPrice += $item->price * $item->qty;
        }
        $pdf = Pdf::loadView('frontend.dashboard.order.user_invoice_download', compact('order', 'orderItems', 'totalPrice'))
        ->setPaper('a4')
        ->setOptions([
            'tempDir' => public_path('temp'),
            'chroot' => public_path(),
        ]);

        return $pdf->download('invoice.pdf');
    }
}
