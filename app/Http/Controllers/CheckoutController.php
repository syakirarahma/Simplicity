<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use App\Http\Controllers\validate;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\MeatPackage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'meat_package', 'user'])->where('id', $id)->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);

    }

    public function process(Request $request, $id)
    {
        // dd($request);
        $meat_package = MeatPackage::findOrFail($id);
        $transaction_total = $meat_package->price * $request->qty;

        $transaction = Transaction::create([
            'meat_packages_id' => $id,
            'qty' => $request->qty,
            'users_id' => Auth::user()->id,
            'transaction_total' => $transaction_total,
            'transaction_status' => 'IN_CART',
           
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'address' => Auth::user()->address
        ]);
        return redirect()->route('checkout', $transaction->id);
    }
    

    public function remove(Request $request, $detail_id)
    {
        
    }

    public function create(Request $request, $id)
    {
        
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details','meat_package.galleries',
        'user'])->findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        // $transaction_id = $transaction->id;

        // $transaction_detail = Transaction::where('transaction_id', $transaction_id)->get();
        
        // foreach($transaction_detail as $transactions){
        //     $meat_package = MeatPackage::where('id',$transactions->transaction_id)->first();
        //     $meat_package->stock = $meat_package->stock - $transactions->qty;
        // }

        // $transaction->update();
        $transaction->save();

        //Set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        //Buat array yang dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'TEST-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => ['gopay'],
            'vtweb' => []
        ];

        try {
            //Ambil halaman payment di midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            //Redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        

        // kirim email e-ticket ke user
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return view('pages.success');
    }
}
