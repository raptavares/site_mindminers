<div class="cms-carousel cms-carousel-showcase <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" data-center="true">
    <?php
    $posts = $atts['posts'];
    $size = 'full';
    while($posts->have_posts()){
        $posts->the_post();
        $demo_meta = whole_get_post_meta();
        $home_url = home_url().'/?page_id='.$demo_meta['showcase_url'];

        ?>
            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-feature-img';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    else:
                        $class = ' no-feature-img';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                    endif;
                ?>
                <a href="<?php echo esc_url($home_url); ?>" target="_blank" title="<?php the_title();?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="" /></a>
            </div>

        <?php
    }
    ?>
</div>