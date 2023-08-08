<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						@for ($i = 0; $i < count($slideshows); $i++)
							@if($i==0)
							<li data-target="#slider-carousel" data-slide-to="{{$i}}" class="active"></li>
							@else
							<li data-target="#slider-carousel" data-slide-to="{{$i}}"></li>
							@endif
						@endfor	
						</ol>
						
						<div class="carousel-inner">

						@foreach($slideshows as $slideshow)
							@if($loop->first)
							<div class="item active">
							@else
							<div class="item">
							@endif
								<div class="col-sm-6">
									<h1>{{$slideshow->title}}</h1>
									<h2>{{$slideshow->subtitle}}</h2>
									<p>{{$slideshow->text}}</p>
									<a href="{{$slideshow->link}}" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/slideshows/{{$slideshow->img}}" class="girl img-responsive" alt="" />
									
								</div>
							</div>							
						@endforeach	
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->