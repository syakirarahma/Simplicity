<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MeatPackage;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = MeatPackage::with(['galleries'])
                    ->where('slug', $slug)
                    ->firstOrFail();
        return view('pages.detail_produk',[
            'item' => $item
        ]);
    }

    public function order(Request $request, $slug)
    {
        // dd($request);
        $item = MeatPackage::where('slug', $slug)->first();
        $time = Carbon::now();

        #save to database orders
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->time = $time;
        $order->status = 0;
        $order->total_price = $item->price * $request->qty;
        $order->save();

        #save to database cart
        $new_order = Cart::where('user_id', Auth::user()->id)
                    ->where('status', 0)->first();

        $cart = new Cart;
        $cart->meat_packages_id = $item->id;
        $cart->order_id = $order->id;
        $cart->total = $request->qty;
        $cart->total_price = $item->price * $request->qty;
        $cart->save();

        return redirect('pages/home');

    }
}
