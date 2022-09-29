</div>
<footer id="footer">

<nav id="secondary-menu">
				
				<?php wp_nav_menu(array('theme_location' => 'secondary-menu')); ?>
			</nav>

<div id="copyright">

&copy; <?php echo esc_html( date_i18n( __( 'Y', 'lernhausfilm' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>