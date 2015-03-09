<div class="navigation">

	<div class="topnav">
		<ul>
			<li <?php if ( is_etc_section('work') ) echo 'class="active"'; ?>><a href="/everything">Work</a></li>
			<li <?php if ( is_etc_section('news') ) echo 'class="active"'; ?>><a href="/category/news">News</a></li>
			<li <?php if ( is_etc_section('about') ) echo 'class="active"'; ?>><a href="/profile">About</a></li>
			<li <?php if ( is_page('contact') ) echo 'class="active"'; ?>><a href="/contact">Contact</a></li>
			<li class="searchtoggle"><a href="">Search</a></li>
		</ul>
	</div>

	<?php if ( is_etc_section('work') ) : ?>
		<div class="subnav">
			<ul>
				<li <?php if ( is_etc_section('everything') ) echo 'class="active"'; ?>><a href="/everything">All Projects</a></li>
				<li <?php if ( is_tax('etc_project_typologies','branding') ) echo 'class="active"'; ?>><a href="/typologies/branding/">Branding</a></li>
				<li <?php if ( is_tax('etc_project_typologies','publications') ) echo 'class="active"'; ?>><a href="/typologies/publications/">Publications</a></li>
				<li <?php if ( is_tax('etc_project_typologies','websites') ) echo 'class="active"'; ?>><a href="/typologies/websites/">Websites</a></li>
				<li <?php if ( is_tax('etc_project_typologies','art-direction') ) echo 'class="active"'; ?>><a href="/typologies/art-direction/">Art Direction</a></li>
				<li <?php if ( is_tax('etc_project_typologies','signage') ) echo 'class="active"'; ?>><a href="/typologies/signage/">Signage</a></li>
				<li <?php if ( is_tax('etc_project_typologies','type-design') ) echo 'class="active"'; ?>><a href="/typologies/type-design/">Type Design</a></li>
			</ul>
		</div>
	<?php endif; ?>

</div>