<?php $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; ?>
<div class="cms-carousel cms-portfolio cms-carousel-portfolio-simple <?php echo esc_attr($atts['template']);?> dot-style-<?php echo esc_attr($dot_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'full';
    while($posts->have_posts()){
        $posts->the_post();
        ?>
            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    else:
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                    endif;
                ?>
                <div class="cms-carousel-portfolio-wrap" style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);">
                    <div class="cms-portfolio-content">
                        <div class="cms-portfolio-category ft-dsi">
                            <?php echo get_the_term_list( get_the_ID(), 'portfolio_categories' ); ?>
                        </div>
                        <h3 class="cms-portfolio-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <a class="cms-portfolio-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('View Project', 'whole'); ?></a>
                    </div>
                </div>
            </div>

        <?php
    }
    ?>
</div>