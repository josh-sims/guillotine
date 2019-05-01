<?php
/**
 * 404 Page Template
 *
 */
?>
<?php wp_head(); ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="/">DEVWIKI</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Wiki
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/contacts/">Contacts</a>
							<a class="dropdown-item" href="/github/">GitHub</a>
							<a class="dropdown-item" href="/mysql/">MySQL</a>
							<a class="dropdown-item" href="/linux-servers/">Linux Servers</a>
							<a class="dropdown-item" href="/passwords/">Passwords</a>
							<a class="dropdown-item" href="/windows-servers/">Windows Servers</a>
							<a class="dropdown-item" href="/wp-plugins/">WP & Plugins</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/pmi/">PMI</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/propertyware/">Propertyware</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/realpage/">RealPage</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/kigo/">Kigo</a>
					</li>
					<li class="highlighted">
						<a href="/search/wiki-search"><i class="fas fa-search"></i></a>
					</li>
				</ul>
			</div>
	</nav>
	<div class="container mt-5 mb-5">
        <div class="row"> 
            <div class="col-12 text-center">
                <h1 class="text-center">Oops! Page not found.</h1>
                <h2 class="text-center">Check out the weather on Mars instead...</h2>
                <iframe src='https://mars.nasa.gov/layout/embed/image/insightweather/' width='100%' height='530'  scrolling='no' frameborder='0' style="max-width:960px;margin:0px auto;"></iframe>
            </div>
        </div>
    </div><!--end container-->
<?php wp_footer(); ?>
