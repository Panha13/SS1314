@extends("layouts.default")
@section("content")
<div class="col-sm-9 padding-right">

<div class="features_items"><!--features_items-->
	<h2 class="title text-center">{{__('Features Items')}}</h2>
	@foreach($featuredproducts as $fp)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
			<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
@csrf
				<input type="hidden" value="{{ $fp->pid }}" name="id">
				<input type="hidden" value="{{ $fp->pname }}" name="name">
				<input type="hidden" value="{{ $fp->pprice }}" name="price">
				<input type="hidden" value="{{ $fp->pimg }}"  name="image">
				<input type="hidden" value="1" name="quantity">
					<div class="productinfo text-center">
						<img src="images/home/{{$fp->pimg}}" alt="" />
						<h2>${{$fp->pprice}}</h2>
						<p>{{$fp->pname}}</p>
						<button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('Add to cart')}}</button>
					</div>
			</form>
			</div>

			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>{{__('Add to wishlist')}}</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>{{__('Add to compare')}}</a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach							
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tshirt" data-toggle="tab">{{__('T-Shirt')}}</a></li>
			<li><a href="#blazers" data-toggle="tab">{{__('Blazers')}}</a></li>
			<li><a href="#sunglass" data-toggle="tab">{{__('Sunglass')}}</a></li>
			<li><a href="#kids" data-toggle="tab">{{__('Kids')}}</a></li>
			<li><a href="#poloshirt" data-toggle="tab">{{__('Polo shirt')}}</a></li>
		</ul>
	</div>
	<div class="tab-content">

		
		
		
		
		
		
		
	</div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">{{__('recommended items')}}</h2>
	
	
</div><!--/recommended_items-->

</div>
@endsection
