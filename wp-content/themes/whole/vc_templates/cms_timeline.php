<?php
extract(shortcode_atts(array(                     
    'year1' => '',              
    'year2' => '',              
    'year3' => '',              
    'year4' => '',              
    'year5' => '',              
    'timeline_title1' => '',              
    'timeline_title2' => '',              
    'timeline_title3' => '',              
    'timeline_title4' => '',              
    'timeline_title5' => '',              
    'timeline_description1' => '',              
    'timeline_description2' => '',       
    'timeline_description3' => '',       
    'timeline_description4' => '',             
    'timeline_description5' => '',                    
), $atts));
?>
<div class="cms-timeline cms-timeline-layout1">
	<ul class="cms-timeline-list">
		<?php
	        for($i=1;$i<6;$i++){
	            $year = ${"year".$i};
	            $title = ${"timeline_title".$i};
	            $description = ${"timeline_description".$i};
	            if(!empty($title) && !empty($description)): ?>
	            <li class="cms-timeline-item clearfix">
	            	<span class="cms-timeline-year"><?php echo esc_attr($year); ?><i class="fa fa-clock-o"></i></span>
	            	<div class="cms-timeline-content">
	            		<h3 class="cms-timeline-title"><?php echo esc_attr($title); ?></h3>
	                	<div class="cms-timeline-desc"><?php echo apply_filters('the_content', $description); ?></div>
	            	</div>
	            </li>
	            <?php endif;
	        }
	    ?>
	</ul>
</div>