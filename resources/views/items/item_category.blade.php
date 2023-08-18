@extends('layouts.front-end')
@section('content')
<!-- @php
    var_dump($itemCategories);
@endphp -->
<!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Discover, Shop, Repeat: Your One-Stop Retail Therapy Destination!</h1>
                </div>
            </div>
        </header>
<!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($itemCategories as $itemcategory)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$itemcategory->discount}}%</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{$itemcategory->image}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$itemcategory->name}}</h5>
                                    <!-- Product price-->
                                    @if($itemcategory->discount > 0)
                                    <span class="text-muted text-decoration-line-through text-danger">{{$itemcategory->price}} MMK</span>
                                    {{$itemcategory->price - ($itemcategory->discount/100)*$itemcategory->price}} MMK
                                    @else
                                        {{$itemcategory->price}} MMK
                                    @endif
                                </div>
                            </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent product_actions">
                                    <div class="text-center row">
                                        <div class="col-md-4">
                                            <a class="btn btn-outline-dark mt-auto" href="{{route('items.show',$itemcategory->id)}}">View </a>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" class="qty" value="1">
                                            <button class="btn btn-outline-dark flex-shrink-0 addToCart" id="" type="button" data-id="{{$itemcategory->id}}" data-name="{{$itemcategory->name}}" data-image="{{$itemcategory->image}}" data-price="{{$itemcategory->price}}" data-discount="{{$itemcategory->discount}}">
                                                <!-- <i class="bi-cart-fill me-1"></i> -->
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection