<?php
/**
 * The template for displaying Search Results pages
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

$_get_sidebar = whole_blog_sidebar();
get_header(); ?>

<section id="primary" class="container <?php echo esc_attr($_get_sidebar); ?>">
    <div class="row">
        <div id="content" class="<?php whole_blog_class(); ?>">
            <main id="main" class="site-main" role="main">

            <?php if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    get_template_part( 'single-templates/content/content' );

                endwhile;

                /* get paging_nav. */
                whole_paging_nav();

            else :

                get_template_part( 'single-templates/search', 'not-found' );

            endif; ?>

            </main><!-- #content -->
        </div>

        <?php if($_get_sidebar != 'is-no-sidebar'):
            get_sidebar();
        endif; ?>
        <!-- #sidebar -->
        
    </div>
</section>

<?php get_footer(); ?>