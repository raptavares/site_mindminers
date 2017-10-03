<?php 
    $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; 
    $box_style = isset($atts['box_style']) ? $atts['box_style'] : 'light'; 
?>
<div class="cms-carousel cms-carousel-blog-layout1 <?php echo esc_attr($atts['template']);?> dot-style-<?php echo esc_attr($dot_style); ?> box-style-<?php echo esc_attr($box_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'whole_blog_617x490';
    while($posts->have_posts()){
        $posts->the_post();
        ?>
            <div class="cms-carousel-item">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-feature-img';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                        $thumbnail = get_the_post_thumbnail(get_the_ID(), $size);
                    else:
                        $class = ' no-feature-img';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                ?>
                <div class="entry-blog <?php echo esc_attr($class); ?>">
                    
                    <header class="entry-header">
                        <a href="<?php the_permalink(); ?>"><?php echo ''.$thumbnail.''; ?></a>
                    </header>
                    <div class="entry-body">
                        <div class="entry-meta">
                            <?php whole_post_detail(); ?>
                        </div>
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="entry-content">
                            <?php echo substr(strip_shortcodes(get_the_content()), 0,110); ?>...
                        </div>
                    </div>
                    <footer class="entry-footer">
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'whole') ?></a>
                    </footer>
                    
                </div>
            </div>

        <?php
    }
    ?>
</div>