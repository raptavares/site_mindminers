<?php 
    /* get categories */
        $taxo = 'team_categories';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
?>
<div class="cms-grid-wraper cms-layout-team cms-team-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul class="cms-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all">All</a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'whole_team_337x400';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $team_meta = whole_get_post_meta();
            $show_content = isset($atts['show_content']) ? $atts['show_content'] : 'yes';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
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
                        <h3 class="cms-team-title"><?php the_title();?></h3>
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
</div>