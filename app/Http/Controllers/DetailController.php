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
}
