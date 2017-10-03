<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
    	</div><!-- .site-content -->
	    <?php whole_footer(); ?>
	</div><!-- .site -->
	<?php 
		whole_back_to_top();
		whole_hidden_sidebar();
		whole_search_popup();
		whole_menu_popup(); 
		wp_footer(); 
	?>
	</body>
</html>