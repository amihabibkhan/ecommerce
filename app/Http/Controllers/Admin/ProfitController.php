<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfitController extends Controller
{
    public function profit(Request $request){

        if ($request->start_date){
            $start_date = $request->start_date;
        }else{
            $start_date = Carbon::today()->subDays(30)->format('Y-m-d');
        }

        if ($request->end_date){
            $end_date = $request->end_date;
        }else{
            $end_date = Carbon::today()->format('Y-m-d');
        }

        $orders_for_total = Order::where('status',4)->whereBetween('created_at',[$start_date,$end_date])->get();
        $orders = Order::where('status',4)->whereBetween('created_at',[$start_date,$end_date])->paginate(30);

        return view('admin.pages.profit',compact(['orders_for_total','orders','start_date','end_date']));
    }
}
