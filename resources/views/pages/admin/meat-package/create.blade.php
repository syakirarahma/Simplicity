@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Paket Daging</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('meat-package.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type" value="{{ old('type') }}">
            </div>
            <div class="form-group">
                <label for="stock">stock</label>
                <input type="number" class="form-control" name="stock" placeholder="stock" value="{{ old('stock') }}">
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" rows="10" class="d-block w-100 from-control">{{ old('about') }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="price" value="{{ old('price') }}">
            </div>
            <button class="btn btn-primary btn-block" type="submit">
                Simpan
            </button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection