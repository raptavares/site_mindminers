<?php
/**
 * The template for displaying Archive Portfolio - Postype UI
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); 
?>
<div id="page-portfolio-categories">
    <div class="container">
        <div class="row">
            <?php
            	$term = get_term_by( 'slug', get_query_var( 'portfolio_categories' ), get_query_var( 'taxonomy' ) );
                echo apply_filters('the_content','[vc_row][vc_column][cms_grid layout="masonry" col_xs="1" col_sm="2" col_md="3" col_lg="4" filter="false" source="size:8|order_by:date|tax_query:'.$term->term_id.'" cms_template="cms_grid--portfolio-standard.php"][/vc_column][/vc_row]');
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>