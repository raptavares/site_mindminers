<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="container">
	<main id="main" class="site-main" role="main">

		<section class="error-404 text-center">			
			<div class="h-line">
                <span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
            </div>
			<div class="page-content">
				<?php esc_html_e( 'We are Whole business, our strategists will help you set an objective and choose your tools, developing a plan that is custom-built for your business.', 'whole' ); ?>
			</div><!-- .page-content -->
			<a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Home', 'whole'); ?></a>
		</section><!-- .error-404 -->

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
