<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="frontend/image/logo.png" rel="shortcut icon" >
    <link rel="stylesheet" href="{{ url('frontend/css/style1.css') }}" />
    <title>My Cart</title>
</head>
<body>
    <div class="header">
        @include('../includes/navbar')
    </div>

    <!-- Content -->
    <div class="main">
        <div class="container cart-page">
            <div class="row mb-3" style="color: black">
                <div class="col">
                    <h4><u>Item</u></h4>
                </div>
                <div class="col">
                    <h4 style="float: right"><i class="fa fa-shopping-cart"></i> My Shopping Cart</h4>
                </div> 
            </div>
            <div class="table-responsive">
                <table class="table">
                    <?php 
                    $no = 1;
                    $total = 0; 
                    ?>
                    <tr>
                        <th>No</th>
                        {{-- <th>Tanggal</th> --}}
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        {{-- <th>Status</th> --}}
                        <th>Sub Total</th>
                        <th>Checkout</th>
                    </tr>
                    @forelse ($items as $item)
                        <tr>
                            <?php $total += ($item->transaction_total) ?>
                            <td>{{ $no++ }}</td>
                            {{-- <td>{{ $item->created_at }}</td> --}}
                            <td>{{$item->meat_package->title }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp {{ $item->meat_package->price }}</td>
                            {{-- <td>{{ $item->transaction_status }}</td> --}}
                            <td>Rp {{ $item->transaction_total }}</td>
                            <td><a href="{{ route('checkout_process', $item->id) }}" type="button" class="btn btn-warning">Detail</a></td>
                        </tr> 
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="4">Total Harga </td>
                        <td colspan="2">Rp {{ $total }}</td>
                    </tr>
                </table>
            </div>
            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2" style="background-color:#FC5043; color: white">
                Process Payment
            </a>
                
            
        </div>
    </div>
</body>
</html>