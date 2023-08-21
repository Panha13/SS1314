@extends('layouts.default')
@section('content')
    <div class="col-sm-9 padding-right">

        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ __('Features Items') }}</h2>
            @foreach ($featuredproducts as $fp)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $fp->pid }}" name="id">
                            <input type="hidden" value="{{ $fp->pname }}" name="name">
                            <input type="hidden" value="{{ $fp->pprice }}" name="price">
                            <input type="hidden" value="{{ $fp->pimg }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <div class="productinfo text-center">
                                <div style="position: relative; width: 100%; height: 0; padding-bottom: 100%;">
                                    <img src="images/products/{{ $fp->pimg }}" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                </div>
                                <h2>${{ $fp->pprice }}</h2>
                                <p>{{ $fp->pname }}</p>
                                <button type="submit" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    {{ __('Add to cart') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div><!--features_items-->

		<!--category-tab-->
        {{-- <div class="category-tab">
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tshirt" data-toggle="tab">{{ __('T-Shirt') }}</a></li>
                    <li><a href="#blazers" data-toggle="tab">{{ __('Blazers') }}</a></li>
                    <li><a href="#sunglass" data-toggle="tab">{{ __('Sunglass') }}</a></li>
                    <li><a href="#kids" data-toggle="tab">{{ __('Kids') }}</a></li>
                    <li><a href="#poloshirt" data-toggle="tab">{{ __('Polo shirt') }}</a></li>
                </ul>
            </div>
            <div class="tab-content">
            </div>
        </div> --}}
		<!--/category-tab-->
		<!--recommended_items-->
        {{-- <div class="recommended_items">
            <h2 class="title text-center">{{ __('recommended items') }}</h2>
        </div> --}}
		<!--/recommended_items-->
        <div class="pagination justify-content-center">
            {{ $featuredproducts->links("pagination::bootstrap-4") }}
        </div>
        
    </div>
    
@endsection
