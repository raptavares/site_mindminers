<div class="cms-fancyboxes-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['title']!=''):?>
        <div class="cms-fancyboxes-head">
            <div class="cms-fancyboxes-title">
                <?php echo apply_filters('the_title',$atts['title']);?>
            </div>
            <div class="cms-fancyboxes-description">
                <?php echo apply_filters('the_content',$atts['description']);?>
            </div>
        </div>
    <?php endif;?>
    <div class="row cms-fancyboxes-body">
        <?php
            $columns = ((int)$atts['cms_cols'])?(int)$atts['cms_cols']:1;
            $item_class = "";
            switch($columns){
                    case "1 Column":
                        $item_class = "";
                        break;
                    case "2 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-6";
                        break;
                    case "3 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
                        break;
                    case "4 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-3";
                        break;
                    case "6 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-2";
                        break;

                    default:
                        $item_class = "";
                        break;
                }
            for($i=1;$i<=$columns;$i++){ ?>
                <?php
                $icon = isset($atts['icon'.$i])?$atts['icon'.$i]:'';
                $content = isset($atts['description'.$i])?$atts['description'.$i]:'';
                $image = isset($atts['image'.$i])?$atts['image'.$i]:'';
                $title = isset($atts['title'.$i])?$atts['title'.$i]:'';
                $button_link = isset($atts['button_link'.$i])?$atts['button_link'.$i]:'';
                $image_url = '';
                if (!empty($image)) {
                    $attachment_image = wp_get_attachment_image_src($image, 'full');
                    $image_url = $attachment_image[0];
                }
                ?>
                    <div class="<?php echo esc_attr($item_class);?>">
                        <?php if($image_url):?>
                        <div class="fancy-box-image">
                            <img src="<?php echo esc_attr($image_url);?>" />
                        </div>
                        <?php else:?>
                        <div class="fancy-box-icon">
                            <i class="<?php echo esc_attr($icon);?>"></i>
                        </div>
                        <?php endif;?>
                        <?php if($title):?>
                            <h3><?php echo apply_filters('the_title',$title);?></h3>
                        <?php endif;?>
                        <div class="fancy-box-content">
                            <?php echo apply_filters('the_content',$content);?>
                        </div>
                        <?php if($atts['button_text']!=''):?>
                            <div class="cms-fancyboxes-foot">
                                <?php
                                $class_btn = ($atts['button_type']=='button')?'btn btn-large':'';
                                ?>
                                <a href="<?php echo esc_url($button_link);?>" class="<?php echo esc_attr($class_btn);?>"><?php echo esc_attr($atts['button_text']);?></a>
                            </div>
                        <?php endif;?>
                    </div>
            <?php }
        ?>
    </div>
</div>