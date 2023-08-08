<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Admin Page</span>
        </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item {{Request::is('admins')? 'active': ''}}">
						<a class="sidebar-link" href="/admins">
             		 	<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
				</li>					
					<li class="sidebar-item {{Request::is('admins/slideshow*')? 'active': ''}}">
						<a class="sidebar-link" href="/admins/slideshow">
             		 	<i class="align-middle" data-feather="film"></i> <span class="align-middle">Slideshow</span>
            			</a>
				</li>
			</ul>

				
			</div>
		</nav>