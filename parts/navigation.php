<div class="navigation">

	<div class="topnav">
		<ul>
			<li <?php if ( is_etc_section('work') ) echo 'class="active"'; ?>><a href="/categories/">Work</a></li>
			<li <?php if ( is_etc_section('news') ) echo 'class="active"'; ?>><a href="/category/news">News</a></li>
			<li <?php if ( is_etc_section('about') ) echo 'class="active"'; ?>><a href="/profile">About</a></li>
			<li <?php if ( is_page('contact') ) echo 'class="active"'; ?>><a href="/contact">Contact</a></li>
			<li id="searchtoggle"><a href="">Search</a></li>
		</ul>
	</div>

	<?php if ( is_etc_section('work') || is_etc_section('about') ) : ?>
		<div class="subnav">
			<ul>
				<?php if ( is_etc_section('work') ) : ?>
					<li <?php if ( is_etc_section('categories') ) echo 'class="active"'; ?>><a href="/categories">Categories</a></li>
					<li <?php if ( is_etc_section('everything') ) echo 'class="active"'; ?>><a href="/everything">Everything</a></li>
					<li <?php if ( is_etc_section('clients') ) echo 'class="active"'; ?>><a href="/clients">Clients</a></li>
					<li <?php if ( is_etc_section('fonts') ) echo 'class="active"'; ?>><a href="/fonts">Fonts</a></li>
				<?php endif; ?>
		
				<?php if ( is_etc_section('about') ) : ?>
					<li <?php if ( is_page('profile') ) echo 'class="active"'; ?>><a href="/profile">Profile</a></li>
					<li <?php if ( is_page('people') ) echo 'class="active"'; ?>><a href="/people">People</a></li>
					<li <?php if ( is_page('credits') ) echo 'class="active"'; ?>><a href="/credits">Credits</a></li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>

</div>