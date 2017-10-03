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

    /*ajax media*/
    wp_enqueue_style('wp-mediaelement');
    wp_enqueue_script('wp-mediaelement');
    /* js, css for load more */
    wp_register_script('cms-loadmore-js', get_template_directory_uri() . '/assets/js/cms_loadmore_grid.js', array('jquery'), '1.0', true);
    // What page are we on? And what is the pages limit?
    global $wp_query;
    $max = $wp_query->max_num_pages;
    $limit = $atts['limit'];
    $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

    // Add some parameters for the JS.
    $current_id = str_replace('-', '_', $atts['html_id']);
    wp_localize_script(
        'cms-loadmore-js',
        'cms_more_obj' . $current_id,
        array(
            'startPage' => $paged,
            'maxPages' => $max,
            'total' => $wp_query->found_posts,
            'perpage' => $limit,
            'nextLink' => next_posts($max, false),
            'masonry' => $atts['layout']
        )
    );
    wp_enqueue_script('cms-loadmore-js');

    $image_crop = isset($atts['image_crop']) ? $atts['image_crop'] : '';
    $item_space = isset($atts['item_space']) ? $atts['item_space'] : '15px';
    $nav_style = isset($atts['nav_style']) ? $atts['nav_style'] : 'nav';
    $nav_show_hide = isset($atts['nav_show_hide']) ? $atts['nav_show_hide'] : 'show';
    $btn_load_style = isset($atts['btn_load_style']) ? $atts['btn_load_style'] : 'modern';

?>
<div class="cms-grid-wraper cms-portfolio cms-portfolio-grid <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
    <div class="row <?php echo esc_attr($atts['grid_class']);?>" style="margin: 0 -<?php echo esc_attr($item_space); ?>;">
        <?php
        $posts = $atts['posts'];
        $size = '';
        if($image_crop == 'yes') {
            $size = 'whole_portfolio_670x488';
        } else {
            $size = 'full';
        }

        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            
            $portfolio_meta = whole_get_post_meta();
            $width_item = !empty($portfolio_meta['width_item']) ? $portfolio_meta['width_item']: 'w_default';
            $portfolio_featured_image = !empty($portfolio_meta['portfolio_featured_image']['url']) ? $portfolio_meta['portfolio_featured_image']['url']: '';

            $col_lg = 12 / $atts['col_lg'];
            $col_md = 12 / $atts['col_md'];
            $col_sm = 12 / $atts['col_sm'];
            $col_xs = 12 / $atts['col_xs'];

            if($width_item == 'w25') {
                $atts['item_class_custom'] = "cms-grid-item col-lg-3 col-md-3 col-sm-{$col_sm} col-xs-{$col_xs}";
            } elseif($width_item == 'w33') {
                $atts['item_class_custom'] = "cms-grid-item col-lg-4 col-md-4 col-sm-{$col_sm} col-xs-{$col_xs}";
            } elseif($width_item == 'w50') {
                $atts['item_class_custom'] = "cms-grid-item col-lg-6 col-md-6 col-sm-{$col_sm} col-xs-{$col_xs}";
            } elseif($width_item == 'w75') {
                $atts['item_class_custom'] = "cms-grid-item col-lg-9 col-md-9 col-sm-{$col_sm} col-xs-{$col_xs}";
            } else {
                $atts['item_class_custom'] = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
            }

            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="<?php echo esc_attr($atts['item_class_custom']);?>" style="padding: <?php echo esc_attr($item_space); ?>;" data-groups='[<?php echo implode(',', $groups);?>]'>
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
                    <div class="cms-portfolio-image">
                        <?php
                            if (!empty($portfolio_featured_image) && $item_space != '0px') { ?>
                                <img src="<?php echo esc_url($portfolio_featured_image); ?>" />
                            <?php } else {
                                echo wp_kses_post($thumbnail); 
                            } 
                        ?>

                        <div class="cms-portfolio-overlay">
                            <div class="cms-portfolio-holder">
                                <h3 class="cms-portfolio-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="cms-portfolio-category ft-dsi">
                                    <?php echo get_the_term_list( get_the_ID(), 'portfolio_categories' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php 
        if($nav_show_hide == 'show') {
            if($nav_style == 'loadmore') { ?>
                <div class="cms_pagination text-center <?php echo esc_attr($btn_load_style); ?>" style="margin-top: -<?php echo esc_attr($item_space); ?>;"></div>
            <?php } else {
                whole_paging_nav();
            }
        }
    ?>
</div>