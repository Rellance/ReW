<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use DateTime;

class ReportController extends Controller
{
    public function AdminAllReports()
    {
        return view('admin.backend.report.all_reports');
    }

    public function AdminSearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formattedDate = $date->format('d F Y');
        $orders = Order::where('order_date', $formattedDate)->orderBy('id', 'DESC')->get();
        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'No orders found for the selected date.');
        }
        return view('admin.backend.report.search_by_date', compact('orders', 'formattedDate'));
    }

    public function AdminSearchByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year_number;

        $orderMonth = Order::where('order_month', $month)->where('order_year', $year)->latest()->get();
        return view('admin.backend.report.search_by_month', compact('orderMonth', 'month', 'year'));
    }
    // End Method 
    public function AdminSearchByYear(Request $request)
    {
        $year = $request->year;
        $orderYear = Order::where('order_year', $year)->latest()->get();
        return view('admin.backend.report.search_by_year', compact('orderYear', 'year'));
    }

    public function ClientAllReports()
    {
        return view('client.backend.report.all_reports');
    }

    public function ClientSearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formattedDate = $date->format('d F Y');

        $cid = Auth::guard('client')->id();

        $orders = Order::where('order_date', $formattedDate)->whereHas('orderItems', function ($query) use ($cid) {
            $query->where('client_id', $cid);
        })->orderBy('id', 'DESC')->get();

        $orderGroupData = OrderItem::with('order', 'product')
            ->whereIn('order_id', $orders->pluck('id'))
            ->where('client_id', $cid)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('order_id');

        return view('client.backend.report.search_by_date', compact('orderGroupData', 'formattedDate'));
    }

    public function ClientSearchByMonth(Request $request){
        $month = $request->month;
        $year = $request->year_number;

        $cid = Auth::guard('client')->id();

        $orders = Order::where('order_month', $month)->where('order_year', $year)->whereHas('orderItems', function ($query) use ($cid) {
            $query->where('client_id', $cid);
        })->orderBy('id', 'DESC')->get();

        $orderGroupData = OrderItem::with('order', 'product')
            ->whereIn('order_id', $orders->pluck('id'))
            ->where('client_id', $cid)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('order_id');

        return view('client.backend.report.search_by_month', compact('orderGroupData', 'month', 'year'));
    }

    public function ClientSearchByYear(Request $request)
    {
        $year = $request->year;

        $cid = Auth::guard('client')->id();

        $orders = Order::where('order_year', $year)->whereHas('orderItems', function ($query) use ($cid) {
            $query->where('client_id', $cid);
        })->orderBy('id', 'DESC')->get();

        $orderGroupData = OrderItem::with('order', 'product')
            ->whereIn('order_id', $orders->pluck('id'))
            ->where('client_id', $cid)
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('order_id');

        return view('client.backend.report.search_by_year', compact('orderGroupData', 'year'));
    }
}
