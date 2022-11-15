<?php

namespace App\Http\Controllers;

use App\Models\MeatPackage;
use App\Models\Transaction;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        // $meat_packages_id = MeatPackage::where();
        $items = Transaction::where('users_id', $user_id)->where('transaction_status', 'IN_CART')->get();
        // $img = Gallery::Where('meat_packages_id', MeatPackage::where('meat_packages_id', $meat_packages_id))->get();
        
        return view('pages.cart',[
            'items' => $items,
            // 'img' => $img
        ]);
    }
}
