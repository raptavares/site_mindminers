<?php $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; ?>
<div class="cms-carousel cms-portfolio cms-carousel-portfolio-slider <?php echo esc_attr($atts['template']);?> dot-style-<?php echo esc_attr($dot_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
                    <a href="<?php the_permalink(); ?>"></a>
                </div>
            </div>

        <?php
    }
    ?>
</div>