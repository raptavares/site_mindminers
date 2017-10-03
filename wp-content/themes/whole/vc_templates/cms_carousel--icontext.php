<div class="cms-carousel cms-fancyboxes-wraper cms-fancyboxes-deault text-left rda_fadeIn <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $counter = 0;
    $rows = 2;
    while ($posts->have_posts()) {
        $posts->the_post();
        $counter++;

        if($rows == 1){
            echo '<div class="cs-carousel-item-wrap">';
        }else{
            if($counter % $rows == 1){
                echo '<div class="cs-carousel-item-wrap">';
            }
        }
        ?>
        <div class="cms-carousel-item cms-fancybox-item">
            <?php $icon_meta = whole_get_post_meta(); if(!empty($icon_meta['icon_text'])) { ?>
                <div class="cms-fancybox-icon">
                    <i class="<?php echo esc_attr($icon_meta['icon_text']); ?>"></i>
                </div>
            <?php } ?>
            <div class="cms-fancybox-content">
                <h3 class="cms-fancybox-title "><?php the_title(); ?></h3>
                <div class="cms-fancybox-description">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
        if($rows == 1){
            echo '</div>';
        }else{
            if($counter % $rows == 0){
                echo '</div>';
            }
        }
        ?>
    <?php
    }
    ?>
</div>