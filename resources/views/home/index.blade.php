@extends('layouts.main')

@section('container')

    @include('layouts.navbar')
    <div class="container">
        <h1>Produk</h1>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="" width="200">
                        </div>
                        <h5 class="text-center">{{ $product->name }}</h5>
                        <h4 class="text-center fw-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</h4>
                        <p>
                            {!! $product->description !!}
                        </p>
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn col-sm-3 btn-sm mt-5 btn-outline-dark">Beli</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="my-3 d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </div>

@endsection
