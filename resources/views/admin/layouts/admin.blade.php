<!DOCTYPE html>
<html lang="en">

@include("admin.includes.head")

<body>
	<div class="wrapper">
		
    @include("admin.includes.sidebar")
		<div class="main">			
        @include("admin.includes.header")
		@yield("content");
        @include("admin.includes.footer")
		</div>
	</div>

	<script src={{URL::asset("admin/js/app.js")}}></script>

	

</body>

</html>