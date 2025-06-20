@extends('layout')

@section('content')
    <section id="intro">
        <div class="container-lg p-5">
            <h2>All Products</h2>
            <div class="row">

                @foreach($items as $item)
                    <div class="col-3">
                        <div class="card my-2 shadow-lg rounded-top">
                            <img src="{{$item->image}}" class="card-img-top" width="200px" height="200px" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <p class="card-text">${{$item->price}}</p>
                                <button class="btn btn-outline-dark d-block"><i class="bi bi-cart4 me-2"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
