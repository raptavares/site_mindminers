<?php 
    /* get categories */
    $taxo = 'portfolio_categories';
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

    wp_register_script('cms-scroll-parallax', get_template_directory_uri() . '/assets/js/scrollax.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('cms-scroll-parallax');

    wp_register_script('cms-parallax', get_template_directory_uri() . '/assets/js/cms-parallax.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('cms-parallax');

?>
<div class="cms-grid-wraper cms-portfolio cms-portfolio-parallax text-center <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter ft-pb">
            <ul class="cms-filter-category list-unstyled list-inline cms-filter-style1">
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
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'full';
        
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item col-md-12" data-groups='[<?php echo implode(',', $groups);?>]'>
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
                <div class="cms-portfolio-wrapper">
                    <div class="cms-portfolio-image" data-scrollax-parent="true">
                        <div class="cms-portfolio-cover" data-scrollax="properties: { translateY: '30%' }">
                            <img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="" />
                        </div>
                    </div>
                    <div class="cms-portfolio-holder">
                        <div class="cms-portfolio-category ft-dsi">
                            <?php echo get_the_term_list( get_the_ID(), 'portfolio_categories' ); ?>
                        </div>
                        <h3 class="cms-portfolio-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="cms-portfolio-readmore">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('View Project', 'whole'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>