<?php $dot_style = isset($atts['dot_style']) ? $atts['dot_style'] : 'dark'; ?>
<div class="cms-carousel cms-layout-team cms-team-layout1 <?php echo esc_attr($atts['template']);?> dot-style-<?php echo esc_attr($dot_style); ?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $team_meta = whole_get_post_meta();
        $image_crop = isset($atts['image_crop']) ? $atts['image_crop'] : 'full';
        $show_content = isset($atts['show_content']) ? $atts['show_content'] : 'yes';
        $size = $image_crop;
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
        ?>
        <div class="cms-carousel-item">
            <div class="cms-team-wrapper text-center">
                <div class="cms-team-header">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                        else:
                            $class = ' no-image';
                            $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image-540.jpg';
                            $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="cms-team-image '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="cms-team-overlay">
                        <ul class="cms-team-social">
                            <?php
                                for($i=1;$i<5;$i++){
                                    $team_icon = $team_meta['team_icon'.$i];
                                    $team_link = $team_meta['team_link'.$i];
                                    if(!empty($team_icon)) { ?>
                                        <li><a href="<?php echo esc_url($team_link);?>"><i class="<?php echo esc_attr($team_icon);?>"></i></a></li>
                                    <?php }
                                }
                            ?>
                        </ul>   
                    </div>
                </div>
                <div class="cms-team-body">
                    <h3 class="cms-team-title" style="color: <?php echo esc_attr($title_color); ?>"><?php the_title();?></h3>
                    <div class="cms-team-position"><?php echo esc_attr($team_meta['team_position']); ?></div>
                    <?php if($show_content == 'yes') { ?>
                        <div class="cms-team-content">
                            <div class="h-line two-line">
                                <span class="line1"></span>
                                <span class="line2"></span>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>