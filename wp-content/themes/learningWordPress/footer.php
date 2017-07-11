	<footer class="site-footer">

		<nav class="site-nav">
				<?php wp_nav_menu(array(
				'menu' => 'Footer Menu Links', 
				'container_id' => 'cssmenu', 
				'walker' => new CSS_Menu_Walker()
			)); ?>
			</nav>

		<p><?php bloginfo('name'); ?> - &copy; <?php echo date( 'Y' );?> This product uses the TMDb API but is not endorsed or certified by TMDb.</p>

	</footer>

</div><!-- container -->

<?php wp_footer();?>
</body>
</html>