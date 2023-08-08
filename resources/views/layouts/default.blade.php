<!DOCTYPE html>
<html lang="en">
@include("includes.head")
<body>
	@include("includes.header")
	@include("includes.slideshow")
	<section>
		<div class="container">
			<div class="row">
			@include("includes.sidebar")				
			@yield("content")
			</div>
		</div>
	</section>
	
	@include("includes.footer")
</body>
</html>