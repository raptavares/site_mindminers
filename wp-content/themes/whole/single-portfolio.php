<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" class="container">
    <div id="content">
        <main id="main" class="site-main">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
                ?>
                 <div class="single-portfolio-wrap">
                    <?php 
                        // Include the single content template.
                        get_template_part( 'single-templates/single-portfolio/content', whole_portfolio_layout());
                    ?>
                </div>
                <?php 
                
            endwhile;
            ?>

        </main>
    </div><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>