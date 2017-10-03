<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @since 1.0.0
 */
global $opt_meta_options;
$image_gallery = !empty($opt_meta_options['single_portfolio_gallery']) ? $opt_meta_options['single_portfolio_gallery'] : '';
$image_ids = explode(',', $image_gallery);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-portfolio sg-portfolio-layout2 row">
		
		<?php if(!empty($opt_meta_options['single_portfolio_gallery'])) { ?>
			<div class="single-portfolio-image sg-gallery col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<?php foreach ($image_ids as $image_id): ?>
		            <?php
			            $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
			            if($attachment_image[0] != ''):?>
			            <div class="single-portfolio-image-item">
			                <img src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
			            </div>
		            <?php endif; ?>
		        <?php endforeach; ?>
			</div>
		<?php } else { ?>
			<div class="single-portfolio-image col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<?php whole_post_thumbnail(); ?>
			</div>
		<?php } ?>

		<div class="single-portfolio-main col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="single-portfolio-holder">
				<h2 class="single-portfolio-title ft-pm">
					<?php the_title(); ?>
					<span class="h-line">
	                    <span class="line1"></span>
	                    <span class="line2"></span>
	                    <span class="line3"></span>
	                </span>
				</h2>
			</div>
			<div class="single-portfolio-content">
				<?php the_content(); ?>
			</div>
			<div class="single-portfolio-boxright">
				<div class="single-portfolio-about">
					<ul>
						<?php if(!empty($opt_meta_options['portfolio_client'])) { ?><li><span><?php echo esc_html__('Client: ', 'whole'); ?></span><?php echo esc_attr($opt_meta_options['portfolio_client']); ?></li><?php } ?>
						<?php if(!empty($opt_meta_options['portfolio_location'])) { ?><li><span><?php echo esc_html__('Location: ', 'whole'); ?></span><?php if(!empty($opt_meta_options['portfolio_location'])) { echo esc_attr($opt_meta_options['portfolio_location']); } ?></li><?php } ?>
						<li><span><?php echo esc_html__('Date: ', 'whole'); ?></span><?php the_date(); ?></li>
						<li><span><?php echo esc_html__('Category: ', 'whole'); ?></span><?php echo get_the_term_list( get_the_ID(), 'portfolio_categories' ); ?></li>
					</ul>
				</div>
				<div class="single-portfolio-share">
					<ul>
						<li><span class="ft-psb"><?php echo esc_html__('Share This Project: ', 'whole'); ?></span></li>
						<?php whole_get_socials_share(); ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="single-portfolio-pagination col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="pt-line"></div>
			<?php whole_portfolio_nav(); ?>
		</div>
	</div>
</article><!-- #post-## -->
