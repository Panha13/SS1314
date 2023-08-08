<!DOCTYPE html>
<html lang="en">
@include("includes.head")
<body>
	@include("includes.header")
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