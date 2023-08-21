@extends("layouts.main")
@section("content")
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">{{ __('Features Items') }}</h2>
		@foreach ($products as $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<!-- Input fields here -->
						<div class="productinfo text-center">
							<div style="position: relative; width: 100%; height: 0; padding-bottom: 100%;">
								<img src="images/products/{{ $product->pimg }}" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
							</div>
							<h2>${{ $product->pprice }}</h2>
							<p>{{ $product->pname }}</p>
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
		<!-- Other product blocks go here -->
		
	</div><!--features_items-->
	<div class="pagination justify-content-center">
		{{ $products->links("pagination::bootstrap-4") }}
	</div>
</div>
@endsection
