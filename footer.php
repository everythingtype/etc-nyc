		</div><!-- Maincolumn -->

		<div class="footer">
			<p class="small">&copy; <?php echo date('Y')?> Everything Type Company</p>
		</div>

	</div><!-- layout -->

</div><!-- scrollingcontent -->

<p class="toplink"><a href="#top" title="Scroll to top">&uarr;</a></p>

<div id="loading"></div>

<?php if ( is_front_page() ) get_template_part('parts/introshade'); ?>

<?php get_template_part('parts/navshade'); ?>

<div class="responsivecue"></div>

<?php wp_footer(); ?>

</body>
</html>
