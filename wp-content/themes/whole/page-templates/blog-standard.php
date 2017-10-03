<?php
/**
 * Template Name: Blog Standard
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */
$_get_sidebar = whole_blog_sidebar();
get_header(); ?>

<section id="primary" class="container <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <div id="content" class="<?php whole_blog_class(); ?>">
            <main id="main" class="site-main" role="main">
                    <?php global $wp_query, $paged;
                
                    $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);
                    
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();

                            get_template_part( 'single-templates/content/content', get_post_format() );

                        endwhile; // end of the loop.

                        /* blog nav. */
                        whole_paging_nav();

                        /* reset custom postdata. */
                        wp_reset_postdata();
                        
                    else :
                        /* content none. */
                        get_template_part( 'single-templates/content', 'none' );

                    endif; ?>
                
            </main><!-- #content -->
        </div>
        <?php if($_get_sidebar != 'is-no-sidebar'):
            get_sidebar();
        endif; ?>
        <!-- #sidebar -->
    </div>
</section><!-- #primary -->

<?php get_footer(); ?>