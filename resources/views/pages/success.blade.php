@extends('layouts.success')
@section('title', 'Halaman Checkout Success')

@section('content')

  <head>
    <link
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <style>
    body {
      text-align: center;
      padding: 40px 0;
      background: #ebf0f5;
    }
    h1 {
      color: #88b04b;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      color: #404f5e;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-size: 20px;
      margin: 0;
    }
    i {
      color: #9abc66;
      font-size: 100px;
      line-height: 200px;
      margin-left: -15px;
    }
    .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #c8d0d8;
      display: inline-block;
      margin: 0 auto;
    }
    button {
      margin-top: 40px;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 12px;
      padding: 10px 18px;
      background-color: #019871;
      text-shadow: 0 1px rgba(128, 128, 128, 0.75);
      
    }
    button a {
        text-decoration: none;
    }
    button:hover {
      background-color: #85ddbf;
    }
  </style>
  <body>
    <div class="card">
      <div
        style="
          border-radius: 200px;
          height: 200px;
          width: 200px;
          background: #f8faf5;
          margin: 0 auto;
        "
      >
        <i class="checkmark">✓</i>
      </div>
      <h1>Pembayaran Sukses</h1>
      <p>
        Kami telah menerima pembayaran anda,<br />
        selamat menikmati pesanan dari Happy Meat
      </p>

      <button id="alertMO" ><a href="{{ url('/') }}">Kembali ke halaman </a></button>
    </div>
  </body>


@endsection