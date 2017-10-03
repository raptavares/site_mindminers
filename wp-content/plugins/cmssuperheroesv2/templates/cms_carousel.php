<div class="cms-carousel owl-carousel <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        ?>
        <div class="cms-carousel-item">
            <?php 
                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.CMS_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                endif;
                echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
            ?>
            <div class="cms-carousel-title">
                <?php the_title();?>
            </div>
            <div class="cms-carousel-time">
                <?php the_time('l, F jS, Y');?>
            </div>
            <div class="cms-carousel-categories">
                <?php echo get_the_term_list( get_the_ID(), 'category', 'Category: ', ', ', '' ); ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>