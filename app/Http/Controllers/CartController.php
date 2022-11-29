<?php

namespace App\Http\Controllers;

use App\Models\MeatPackage;
use App\Models\Transaction;
use App\Http\Requests\Admin\TransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.edit-cart', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->title);
        // $item->update($data);
        
        // $data = new Transaction;
        $item = Transaction::findOrFail($id);
        $item->qty = $request->qty;
        $item->transaction_total = ($request->qty)*($item->meat_package->price);
        $item->save();
        return redirect('/my-cart')->with('Item sudah terupdate!');
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect('/my-cart');
    }
}
