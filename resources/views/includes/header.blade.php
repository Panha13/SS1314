<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> {{__('info@domain.com')}}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								{{__('USA')}}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">{{__('Canada')}}</a></li>
								<li><a href="#">{{__('UK')}}</a></li>
							</ul>
						</div>
	
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								{{__('DOLLAR')}}
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">{{__('Canadian Dollar')}}</a></li>
								<li><a href="#">{{__('Pound')}}</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-user"></i> {{__('Account')}}</a></li>
							<li><a href="#"><i class="fa fa-star"></i> {{__('Wishlist')}}</a></li>
							<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> {{__('Checkout')}}</a></li>
							<li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> {{__('Cart')}}</a></li>
							<li><a href="login.html"><i class="fa fa-lock"></i> {{__('Login')}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">{{__('Toggle navigation')}}</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li>
								<a href="/" class="{{ Request::is('/') ? 'active' : '' }}">{{__('Home')}}</a>
							</li>
							<li>
								<a href="/shop" class="{{ Request::is('shop') ? 'active' : '' }}">{{__('Shop')}}</a>
							</li>
							<li>
								<a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">{{__('Contact')}}</a>
							</li>
							<li>
							<form action="{{ route('change.language') }}" method="POST">
								@csrf
								<select name="locale" onchange="this.form.submit()">
									<option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
									<option value="ch" {{ app()->getLocale() == 'ch' ? 'selected' : '' }}>Chinese</option>
									<option value="kh" {{ app()->getLocale() == 'kh' ? 'selected' : '' }}>Khmer</option>
								</select>
							</form>
						</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<input type="text" placeholder="Search"/>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->