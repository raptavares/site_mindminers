<?php
/*
Plugin Name: FullPage for Visual Composer
Plugin URI: http://www.meceware.com/fp/
Author: Mehmet Celik
Author URI: http://www.meceware.com/
Version: 1.7.2
Description: Create beautiful scrolling fullscreen web sites with Visual Composer and Wordpress, fast and simple. Visual Composer Addon of FullPage JS implementation.
Text Domain: mcw_fullpage
*/

/* Copyright 2015 Mehmet Celik */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

// Include meta box
require_once dirname( __FILE__ ) . '/mcw_metabox/mcw_metabox.php';

if (!class_exists('MCW_FullPage'))
{
  // Admin notice for checking visual composer
  add_action('admin_init', 'mcw_fp_CheckVCVersion');
  function mcw_fp_CheckVCVersion()
  {
    // Check required visual composer version
    $required_vc = '4.7';

    // Check if visual composer is activated
    if (defined('WPB_VC_VERSION'))
    {
      // Compare visual composer version with the required one
      if (version_compare($required_vc, WPB_VC_VERSION, '>' ))
      {
        add_action( 'admin_notices', 'mcw_fp_VCNotCompatible');
      }
    }
    else
    {
      // Visual composer not activated
      add_action( 'admin_notices', 'mcw_fp_VCNotActivated');
    }
  }
  // Visual composer not compatible message
  function mcw_fp_VCNotCompatible()
  {
    echo '<div class="updated"><p><strong>FullPage for Visual Composer</strong> plugin requires <strong>Visual Composer '.$required_vc.' or greater</strong>.</p></div>';
  }
  // Visual composer not activated message
  function mcw_fp_VCNotActivated()
  {
    echo '<div class="updated"><p><strong>FullPage for Visual Composer</strong> plugin requires <strong>Visual Composer</strong> plugin installed and activated.</p></div>';
  }

  class MCW_FullPage
  {
    // FullPageJS version
    protected $fullpage_js_version = '2.9.2';

    // Shortcode name tag
    protected $tag = 'mcw_fullpage';
    // Visual Composer Group Name
    protected $vcGroupName = 'Full Page';

    // Full page script related definitions

    // Full page wrapper anchor name
    protected $an_fullpage = 'mcw_full_page';
    // Section class name
    protected $cn_section = 'mcw_fp_section';
    // Slide class name
    protected $cn_slide = 'mcw_fp_slide';
    // Fixed top class name
    protected $cn_fixed_top = 'mcw_fp_fixed_top';
    protected $cn_fixed_bottom = 'mcw_fp_fixed_bottom';

    // Meta box class
    protected $meta_box = null;

    // Meta Box Name
    protected $meta_box_id = 'mcw_fp_settings'; /* Change on template as well */

    // Meta Box Field ID's
    protected $id_fullPageEnable = 'mcw_fp_enable';

    // FullPage JS initialization code
    protected $fullPageJSInitCode = '';

    // Navigation section ID's
    protected $id_LockAnchors = 'mcw_fp_lockanchors';
    protected $id_Navigation = 'mcw_fp_navigation';
    protected $id_ShowActiveTooltip = 'mcw_fp_showactivetooltip';
    protected $id_BigSectionNavigation = 'mcw_fp_bigsectionnavigation';
    protected $id_SectionColor = 'mcw_fp_sectioncolor';
    protected $id_SectionHoverColor = 'mcw_fp_sectionhovercolor';
    protected $id_SectionActiveColor = 'mcw_fp_sectionactivecolor';
    protected $id_SectionNavigationStyle = 'mcw_fp_sectionnavigationstyle';
    protected $id_SlideNavigation = 'mcw_fp_slidenavigation';
    protected $id_SlideNavigationStyle = 'mcw_fp_slidenavigationstyle';
    protected $id_SlideColor = 'mcw_fp_slidecolor';
    protected $id_SlideHoverColor = 'mcw_fp_slidehovercolor';
    protected $id_SlideActiveColor = 'mcw_fp_slideactivecolor';
    protected $id_BigSlideNavigation = 'mcw_fp_bigslidenavigation';

    // Scrolling section ID's
    protected $id_AutoScrolling = 'mcw_fp_autoscrolling';
    protected $id_ScrollingSpeed = 'mcw_fp_scrollingspeed';
    protected $id_FitToSection = 'mcw_fp_fittosection';
    protected $id_FitToSectionDelay = 'mcw_fp_fittosectiondelay';
    protected $id_ScrollBar = 'mcw_fp_scrollbar';
    protected $id_Easing = 'mcw_fp_easing';
    protected $id_LoopBottom = 'mcw_fp_loopbottom';
    protected $id_LoopTop = 'mcw_fp_looptop';
    protected $id_ContinuousVertical = 'mcw_fp_contvertical';
    protected $id_LoopHorizontal = 'mcw_fp_loophorizontal';
    protected $id_BigSectionsDestination = 'mcw_fp_bigsectionsdestination';
    protected $id_ScrollOverflow = 'mcw_fp_scrolloverflow';
    protected $id_ScrollOverflowFadeScrollbars = 'mcw_fp_hidescrollbars';
    protected $id_ScrollOverflowHideScrollbars = 'mcw_fp_fadescrollbars';
    protected $id_ScrollOverflowInteractiveScrollbars = 'mcw_fp_interactivescrollbars';

    // Design section ID's
    protected $id_ControlArrows = 'mcw_fp_controlarrows';
    protected $id_VerticalCentered = 'mcw_fp_verticalcentered';
    protected $id_Resize = 'mcw_fp_resize';
    protected $id_ResponsiveWidth = 'mcw_fp_respwidth';
    protected $id_ResponsiveHeight = 'mcw_fp_respheight';
    protected $id_PaddingTop = 'mcw_fp_paddingtop';
    protected $id_PaddingBottom = 'mcw_fp_paddingbottom';
    protected $id_TooltipBackground = 'mcw_fp_tooltipbackground';
    protected $id_TooltipColor = 'mcw_fp_tooltipcolor';
    protected $id_FixedElements = 'mcw_fp_fixedelements';

    // Accessibility section ID's
    protected $id_KeyboardScrolling = 'mcw_fp_keyboardscrolling';
    protected $id_AnimateAnchor = 'mcw_fp_animateanchor';
    protected $id_RecordHistory = 'mcw_fp_recordhistory';
    protected $id_ExtraParameters = 'mcw_fp_extraparameters';
    protected $id_VerticallyCentered = 'mcw_fp_vertically_centered';
    protected $id_ControlArrow = 'mcw_fp_control_arrows';

    // Events section ID's
    protected $id_afterLoadEnable = 'mcw_fp_afterloadenable';
    protected $id_evt_afterLoad = 'mcw_fp_evt_afterload';
    protected $id_onLeaveEnable = 'mcw_fp_onleaveenable';
    protected $id_evt_onLeave = 'mcw_fp_evt_onleave';
    protected $id_afterRenderEnable = 'mcw_fp_afterrenderenable';
    protected $id_evt_afterRender = 'mcw_fp_evt_afterrender';
    protected $id_afterResizeEnable = 'mcw_fp_afterresizeenable';
    protected $id_evt_afterResize = 'mcw_fp_evt_afterresize';
    protected $id_afterSlideLoadEnable = 'mcw_fp_afterslideloadenable';
    protected $id_evt_afterSlideLoad = 'mcw_fp_evt_afterslideload';
    protected $id_onSlideLeaveEnable = 'mcw_fp_onslideleaveenable';
    protected $id_evt_onSlideLeave = 'mcw_fp_evt_onslideleave';
    protected $id_beforefullpage = 'mcw_fp_beforefullpage';
    protected $id_evt_beforefullpage = 'mcw_fp_evt_beforefullpage';
    protected $id_afterfullpage = 'mcw_fp_afterfullpage';
    protected $id_evt_afterfullpage = 'mcw_fp_evt_afterfullpage';
    protected $id_afterresponsive = 'mcw_fp_afterresponsize';
    protected $id_evt_afterresponsive = 'mcw_fp_evt_afterresponsive';

    // Customization section ID's
    protected $id_cust_enableVCAnim = 'mcw_fp_cust_enablevcanim';
    protected $id_cust_enableVCAnimReset = 'mcw_fp_cust_enablevcanimreset';
    protected $id_cust_forceRemoveThemeMargins = 'mcw_fp_cust_forceremovethememargins';
    protected $id_cust_videoautoplay = 'mcw_fp_cust_videoautoplay';
    protected $id_cust_forceFixedThemeHeader = 'mcw_fp_cust_forcefixedthemeheader';
    protected $id_cust_forceFixedThemeHeaderSelector = 'mcw_fp_cust_forcefixedthemeheadersel';

    // Advanced section ID's
    protected $id_EnableTemplate = 'mcw_fp_enabletemplate';
    protected $id_TemplateRedirect = 'mcw_fp_templateredirect';
    protected $id_TemplatePath = 'mcw_fp_templatepath';
    protected $id_RemoveThemeJS = 'mcw_fp_removethemejs';
    protected $id_RemoveJS = 'mcw_fp_removejs'; /* Change on template as well */
    protected $id_SectionSelector = 'mcw_fp_sectionselector';
    protected $id_SlideSelector = 'mcw_fp_slideselector';
    protected $id_FooterCode = 'mcw_fp_footercode';

    // Visual Composer Names
    protected $vc_SectionBehaviour = 'mcw_fp_auto_height';
    protected $vc_Anchor = 'mcw_fp_anchor';
    protected $vc_Tooltip = 'mcw_fp_tooltip';
    protected $vc_ColumnSlides = 'mcw_fp_column_slide';
    protected $vc_NoScrollbar = 'mcw_fp_no_scrollbar';
    protected $vc_SectionMainColor = 'mcw_fp_main_color';
    protected $vc_SectionHoverColor = 'mcw_fp_hover_color';
    protected $vc_SectionActiveColor = 'mcw_fp_active_color';

    // Class constructor
    public function __construct()
    {
      // Add fullpage js and css files
      add_action( 'wp_enqueue_scripts', array($this, 'on_wp_enqueue_scripts') );
      // Add fullpage script
      add_action( 'wp_head', array($this, 'on_wp_head') );
      add_action( 'wp_footer', array($this, 'on_wp_footer'), 50 );
      // Add full page div wrapper to the content
      add_filter( 'the_content', array($this, 'on_the_content'), 100 );
      // Template redirect
      add_action( 'template_redirect', array($this, 'on_template_redirect') );
      // Template include
      add_filter( 'template_include', array($this, 'on_template_include') );
      // Remove unwanted JS from header
      add_action( 'wp_print_scripts', array($this, 'on_wp_print_scripts') );
      // Add body class
      add_filter( 'body_class', array($this, 'on_body_class') );

      if ( defined('WPB_VC_VERSION') )
      {
        // Add custom css hook
        add_filter(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, array($this, 'on_vc_custom_css'), 10, 2);
        // execute shortcode hook
        add_filter('vc_shortcode_output', array($this, 'on_vc_shortcode_output'), 10, 3);
      }

      // ******************************************************************************************
      // Admin side

      // Initialize admin interface to add params in vc
      add_action( 'admin_init', array($this, 'on_admin_init') );
      add_action( 'admin_head', array($this, 'on_admin_head') );
    }

    private function get_field_value($id, $default = null)
    {
      // Get field value
      $val = MCW_MetaBox::get_field_value($this->meta_box_id, $id);
      // Return field value or default
      return (empty($val) ? $default : $val);
    }

    // Checks if specified setting is on (used for metabox checkboxes) and returns true or false
    private function is_field_enabled($id)
    {
      // Get field value
      $val = $this->get_field_value($id, 'off');

      // Return true if field is on
      if (isset($val) && ($val == 'on'))
        return true;

      // Return false
      return false;
    }

    private function is_field_on($id)
    {
      return $this->is_field_enabled($id) ? 'true' : 'false';
    }

    // Shortcode regex
    private function getShortcodeRegex($val)
    {
      // WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
      // Also, see shortcode_unautop() and shortcode.js.
      return
        '\\['                // Opening bracket
        . '(\\[?)'           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
        . "($val)"           // 2: Shortcode name
        . '(?![\\w-])'       // Not followed by word character or hyphen
        . '('                // 3: Unroll the loop: Inside the opening shortcode tag
        . '[^\\]\\/]*'       // Not a closing bracket or forward slash
        . '(?:'
        . '\\/(?!\\])'       // A forward slash not followed by a closing bracket
        . '[^\\]\\/]*'       // Not a closing bracket or forward slash
        . ')*?'
        . ')'
        . '(?:'
        . '(\\/)'            // 4: Self closing tag ...
        . '\\]'              // ... and closing bracket
        . '|'
        . '\\]'              // Closing bracket
        . '(?:'
        . '('                // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
        . '[^\\[]*+'         // Not an opening bracket
        . '(?:'
        . '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
        . '[^\\[]*+'         // Not an opening bracket
        . ')*+'
        . ')'
        . '\\[\\/\\2\\]'     // Closing shortcode tag
        . ')?'
        . ')'
        . '(\\]?)';          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
    }

    // Get template file contents
    private function getTemplate($filex, $params)
    {
      if (file_exists($filex))
      {
        extract($params);
        ob_start();
        include($filex);
        return ob_get_clean();
      }

      return '';
    }

    // Asset array function
    private function getAsset($folder, $params = array())
    {
      // Initialize return value
      $events = array();
      // Check if folder is specified
      if (isset($folder) && !empty($folder))
      {
        // Get customization file name
        $file = DIRNAME(__FILE__).'/assets/'.$folder.'/cust.txt';
        // Check if customization file exists
        if (file_exists($file))
        {
          // Get customization file contents
          $file = file_get_contents($file);
          // Decode file contents
          $cust = json_decode($file, true);
          // Error handling
          if (isset($cust) && is_array($cust))
          {
            foreach ($cust as $key => $value)
            {
              if (isset($value) && !empty($value))
              {
                // Get contents
                if (is_array($value))
                {
                  // Load contents from file
                  $content_file = '';
                  if (isset($params['file']) && !empty($params['file']))
                  {
                    $content_file = DIRNAME(__FILE__).'/assets/'.$folder.'/'.$params['file'];
                  }
                  else if (isset($value['file']) && !empty($value['file']))
                  {
                    // Load contents from file
                    $content_file = DIRNAME(__FILE__).'/assets/'.$folder.'/'.$value['file'];
                  }
                  else
                  {
                    return $events;
                  }

                  // Merge parameters arrays
                  if (isset($value['params']))
                  {
                    $params = array_merge($value['params'], $params);
                  }

                  // Get template contents
                  $events[$key] = $this->getTemplate($content_file, $params);
                }
                else
                {
                  $events[$key] = $value;
                }
              }
            }
          }
        }
      }

      return $events;
    }

    private function getColorCodes($color)
    {
      $ret = array('hex' => '', 'rgba' => '');

      // Trim input string
      $color = trim($color);

      // Return default if no color provided
      if(empty($color))
      {
        return $ret;
      }

      // Sanitize $color if "#" is provided
      if ($color[0] == '#')
      {
        // Remove first char
        $color = substr($color, 1);

        // Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6)
        {
          $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        }
        elseif (strlen( $color ) == 3)
        {
          $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        }
        else
        {
          return $ret;
        }

        // Convert hexadec to rgb
        $ret['hex'] = '#'.$color;
        $ret['rgba'] = implode(",", array_map('hexdec', $hex));
      }
      else if (substr($color, 0, 4) == 'rgba')
      {
        $count = preg_match("/^rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(\d*(?:\.\d+)?)\)$/i", $color, $rgba);

        // Count should be 5 if successfull
        if (count($rgba) == 5)
        {
          $hex = "#";
          $hex .= str_pad(dechex($rgba[1]), 2, "0", STR_PAD_LEFT);
          $hex .= str_pad(dechex($rgba[2]), 2, "0", STR_PAD_LEFT);
          $hex .= str_pad(dechex($rgba[3]), 2, "0", STR_PAD_LEFT);

          $ret['hex'] = $hex;
          $ret['rgba'] = $rgba[1].','.$rgba[2].','.$rgba[3];
        }
      }
      else if (substr($color, 0, 3) == 'rgb')
      {
        $count = preg_match("/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/i", $color, $rgb);

        // Count should be 5 if successfull
        if (count($rgba) == 4)
        {
          $hex = "#";
          $hex .= str_pad(dechex($rgba[1]), 2, "0", STR_PAD_LEFT);
          $hex .= str_pad(dechex($rgba[2]), 2, "0", STR_PAD_LEFT);
          $hex .= str_pad(dechex($rgba[3]), 2, "0", STR_PAD_LEFT);

          $ret['hex'] = $hex;
          $ret['rgba'] = $rgba[1].','.$rgba[2].','.$rgba[3];
        }
      }

      // Return calculated values
      return $ret;
    }

    // Add fullpage related JS and CSS files
    // Called by wp_enqueue_scripts action
    public function on_wp_enqueue_scripts()
    {
      global $post;
      if (!isset($post))
        return;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Check if footer code is checked
        $isFooter = $this->is_field_enabled($this->id_FooterCode);
        $dep = array('jquery');

        // Fullpage CSS
        wp_enqueue_style( 'mcw_fp_css', plugins_url('fullpage/jquery.fullpage.min.css', __FILE__), array(), $this->fullpage_js_version, 'all' );
        // Section navigation CSS
        $nav = $this->get_field_value($this->id_Navigation, 'off');
        $section_nav_file = 'default';
        if ($nav != 'off')
        {
          $section_nav_file = $this->get_field_value($this->id_SectionNavigationStyle, 'default');
          wp_enqueue_style( 'mcw_fp_sect_nav_css', plugins_url('fullpage/nav/section/'.$section_nav_file.'.css', __FILE__), array('mcw_fp_css'), $this->fullpage_js_version, 'all' );
        }
        // Slide navigation CSS
        $nav = $this->get_field_value($this->id_SlideNavigation, 'off');
        if ($nav != 'off')
        {
          $slide_nav_file = $this->get_field_value($this->id_SlideNavigationStyle, 'section_nav');
          if ($slide_nav_file == 'section_nav')
          {
            $slide_nav_file = $section_nav_file;
          }
          // TODO: maybe these can be removed in the future
          if ($slide_nav_file == 'crazy-text-effect')
          {
            $slide_nav_file = 'default';
          }
          
          wp_enqueue_style( 'mcw_fp_slide_nav_css', plugins_url('fullpage/nav/slide/'.$slide_nav_file.'.css', __FILE__), array('mcw_fp_css'), $this->fullpage_js_version, 'all' );
        }
        
        // Add easing file
        $easing = $this->get_field_value($this->id_Easing, 'css3_ease');
        if (substr($easing, 0, 3) == 'js_')
        {
          wp_enqueue_script( 'mcw_fp_easing_js', plugins_url('/fullpage/vendors/jquery.easings.min.js', __FILE__), array('jquery'), '1.9.2', $isFooter );
          $dep[] = 'mcw_fp_easing_js';
        }
        // Add scrolloverflow file
        if ( $this->is_field_enabled($this->id_ScrollOverflow) )
        {
          wp_enqueue_script( 'mcw_fp_slimscoll_js', plugins_url('/fullpage/vendors/scrolloverflow.min.js', __FILE__), array('jquery'), '5.2.0', $isFooter );
          $dep[] = 'mcw_fp_slimscoll_js';
        }
        // Add fullpage JS file
        wp_enqueue_script( 'mcw_fp_js', plugins_url('/fullpage/jquery.fullpage.min.js', __FILE__), $dep, $this->fullpage_js_version, $isFooter );
      }
    }

    // Adds full page enable script to the head
    // Called by wp_head action
    public function on_wp_head()
    {
      global $post;
      if (!isset($post))
        return;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Anchors array
        $anchors = array();
        // Tooltips array
        $tooltips = array();
        // Colors
        $nav_section_colors = array();
        // Customizations
        $customizations = array();
        // Global CSS
        $css = '';
        // Fixed elements
        $fixed_elements = array();

        // Get regex of vc_row shortcode
        $pattern = $this->getShortcodeRegex('vc_row');
        // Find all vc_row data
        $count = preg_match_all('/'.$pattern .'/s', $post->post_content, $found);

        // Check if there are rows
        if ( is_array( $found ) && ! empty( $found[0] ) )
        {
          if ( isset( $found[3] ) && is_array( $found[3] ) )
          {
            foreach ( $found[3] as $key => $shortcode_atts )
            {
              // Extract shortcode parameters
              $atts = shortcode_parse_atts( $shortcode_atts );

              // Check row if fixed top
              if (isset($atts[$this->vc_SectionBehaviour]) && $atts[$this->vc_SectionBehaviour] == 'fixed_top')
              {
                // Add fixed element list
                $fixed_elements[] = '.'.$this->cn_fixed_top;
                // Add fixed top css
                $css .= '.'.$this->cn_fixed_top.'{position: fixed !important; z-index: 999999; top: 0px; width: 100%;}';
                continue;
              }

              // Check row if fixed bottom
              if (isset($atts[$this->vc_SectionBehaviour]) && $atts[$this->vc_SectionBehaviour] == 'fixed_bottom')
              {
                // Add fixed element list
                $fixed_elements[] = '.'.$this->cn_fixed_bottom;
                // Add fixed bottom css
                $css .= '.'.$this->cn_fixed_bottom.'{position: fixed !important; z-index: 999999; bottom: 0px; width: 100%;}';
                continue;
              }

              // Set anchor field
              $anchors[$key] = (isset($atts[$this->vc_Anchor])) ? preg_replace('/\s+/', '_', $atts[$this->vc_Anchor]) : 'section'.$key;
              // Set menu tooltip field
              $tooltips[$key] = (isset($atts[$this->vc_Tooltip])) ? $atts[$this->vc_Tooltip] : null;

              // Section colors
              if (isset($atts[$this->vc_SectionMainColor]) && !empty($atts[$this->vc_SectionMainColor]))
              {
                if (!isset($nav_section_colors[$anchors[$key]]))
                  $nav_section_colors[$anchors[$key]] = array();

                $nav_section_colors[$anchors[$key]]['main'] = trim($atts[$this->vc_SectionMainColor]);
              }
              if (isset($atts[$this->vc_SectionHoverColor]) && !empty($atts[$this->vc_SectionHoverColor]))
              {
                if (!isset($nav_section_colors[$anchors[$key]]))
                  $nav_section_colors[$anchors[$key]] = array();

                $nav_section_colors[$anchors[$key]]['hover'] = trim($atts[$this->vc_SectionHoverColor]);
              }
              if (isset($atts[$this->vc_SectionActiveColor]) && !empty($atts[$this->vc_SectionActiveColor]))
              {
                if (!isset($nav_section_colors[$anchors[$key]]))
                  $nav_section_colors[$anchors[$key]] = array();

                $nav_section_colors[$anchors[$key]]['active'] = trim($atts[$this->vc_SectionActiveColor]);
              }
            }
          }
        }

        // Create parameters array
        $parameters = array();

        // Section selector
        $section_selector = $this->get_field_value($this->id_SectionSelector, '');
        if (empty($section_selector))
        {
          $parameters[] = 'sectionSelector:".'.$this->cn_section.'"';
          $section_selector = '.'.$this->cn_section;
        }
        else
        {
          $parameters[] = 'sectionSelector:"'.$section_selector.'"';
        }
        // Slide selector
        $selector = $this->get_field_value($this->id_SlideSelector, '');
        if (empty($selector))
        {
          $parameters[] = 'slideSelector:".'.$this->cn_slide.'"';
        }
        else
        {
          $parameters[] = 'slideSelector:"'.$selector.'"';
        }

        // ****************************************************************************************
        // Navigation parameters
        {
          // Initialization
          $section_nav_file = 'default';

          // navigation, navigationPosition
          $nav = $this->get_field_value($this->id_Navigation, 'off');
          $parameters[] = 'navigation:'.(($nav == 'off') ? 'false' : 'true');
          if ($nav != 'off')
          {
            $parameters[] = 'navigationPosition:'.(($nav == 'right') ? '"right"' : '"left"');
            // navigationTooltips
            if (!empty($tooltips))
            {
              $parameters[] = 'navigationTooltips:["'.implode('", "', $tooltips).'"]';
            }
            // showActiveTooltip
            $parameters[] = 'showActiveTooltip:'.$this->is_field_on($this->id_ShowActiveTooltip);
            
            // Tooltip CSS
            $tooltipCSS = '';
            // Tooltip background color
            $tooltip = $this->get_field_value($this->id_TooltipBackground, '');
            if (!empty($tooltip))
            {
              $tooltipCSS .= 'padding:0 5px;background-color: '.$tooltip.';';
            }
            // Tooltip text color
            $tooltip = $this->get_field_value($this->id_TooltipColor, '');
            if (!empty($tooltip))
            {
              $tooltipCSS .= 'color: '.$tooltip.';';
            }
            // Add tooltip css to global css
            if (!empty($tooltipCSS))
            {
              $css .= '#fp-nav ul li .fp-tooltip{'.$tooltipCSS.'}';
            }
            
            // Load navigation style
            $section_nav_file = $this->get_field_value($this->id_SectionNavigationStyle, 'default');
            
            // Create args array
            $args = array();
            // Set filename
            $args['file'] = $section_nav_file.'.css';
            // Set selector
            $args['selector'] = '#fp-nav';

            // Check if main color is set
            $color = $this->get_field_value($this->id_SectionColor, '');
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_main_enable'] = 'on';
              $args['main'] = $color['hex'];
              $args['main_rgba'] = $color['rgba'];
            }

            // Check if active color is set
            $color = $this->get_field_value($this->id_SectionActiveColor, '');
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_active_enable'] = 'on';
              $args['active'] = $color['hex'];
              $args['active_rgba'] = $color['rgba'];
            }

            // Check if hover color is set
            $color = $this->get_field_value($this->id_SectionHoverColor, '');
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_hover_enable'] = 'on';
              $args['hover'] = $color['hex'];
              $args['hover_rgba'] = $color['rgba'];
            }

            // Load navigation style with parameters
            $customizations[] = $this->getAsset('navigations', $args);

            // CSS customizations for section specific colors
            foreach ($nav_section_colors as $key => $colors)
            {
              // Create args array
              $args = array();
              // Set filename
              $args['file'] = $section_nav_file.'.css';
              // Set selector
              $args['selector'] = 'body[class*="fp-viewing-'.$key.'"] #fp-nav';

              // Check if main color is set
              if (isset($colors['main']))
              {
                $color = $this->getColorCodes($colors['main']);
                $args['color_main_enable'] = 'on';
                $args['main'] = $color['hex'];
                $args['main_rgba'] = $color['rgba'];
              }

              // Check if active color is set
              if (isset($colors['active']))
              {
                $color = $this->getColorCodes($colors['active']);
                $args['color_active_enable'] = 'on';
                $args['active'] = $color['hex'];
                $args['active_rgba'] = $color['rgba'];
              }

              // Check if hover color is set
              if (isset($colors['hover']))
              {
                $color = $this->getColorCodes($colors['hover']);
                $args['color_hover_enable'] = 'on';
                $args['hover'] = $color['hex'];
                $args['hover_rgba'] = $color['rgba'];
              }

              // Load navigation style with parameters
              $customizations[] = $this->getAsset('navigations', $args);
            }
          }

          // slidesNavigation, slidesNavPosition
          $nav = $this->get_field_value($this->id_SlideNavigation, 'off');
          $parameters[] = 'slidesNavigation:'.(($nav == 'off') ? 'false' : 'true');
          if ($nav != 'off')
          {
            $parameters[] = 'slidesNavPosition:'.(($nav == 'top') ? '"top"' : '"bottom"');

            // Load navigation style
            $slide_nav_file = $this->get_field_value($this->id_SlideNavigationStyle, 'section_nav');
            // Slide nav is not the same with section style initially
            $slide_nav_section = false;
            // Check if the slide nav style is the same with section style
            if ($slide_nav_file == 'section_nav')
            {
              // Slide nav is the same with section style
              $slide_nav_section = true;
              // Set slide nav style file
              $slide_nav_file = $section_nav_file;
            }
            // TODO: maybe these can be removed in the future
            if ($slide_nav_file == 'crazy-text-effect')
            {
              $slide_nav_file = 'default';
            }
            
            // Create args array
            $args = array();
            // Set filename
            $args['file'] = $slide_nav_file.'.css';
            // Set selector
            $args['selector'] = '.fp-slidesNav';

            // Check if main color is set
            $color = $this->get_field_value($this->id_SlideColor, '');
            if (empty($color) && $slide_nav_section)
            {
              $color = $this->get_field_value($this->id_SectionColor, '');
            }
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_main_enable'] = 'on';
              $args['main'] = $color['hex'];
              $args['main_rgba'] = $color['rgba'];
            }

            // Check if active color is set
            $color = $this->get_field_value($this->id_SlideActiveColor, '');
            if (empty($color) && $slide_nav_section)
            {
              $color = $this->get_field_value($this->id_SectionActiveColor, '');
            }
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_active_enable'] = 'on';
              $args['active'] = $color['hex'];
              $args['active_rgba'] = $color['rgba'];
            }

            // Check if hover color is set
            $color = $this->get_field_value($this->id_SlideHoverColor, '');
            if (empty($color) && $slide_nav_section)
            {
              $color = $this->get_field_value($this->id_SectionHoverColor, '');
            }
            if (!empty($color))
            {
              $color = $this->getColorCodes($color);
              $args['color_hover_enable'] = 'on';
              $args['hover'] = $color['hex'];
              $args['hover_rgba'] = $color['rgba'];
            }

            // Load navigation style with parameters
            $customizations[] = $this->getAsset('navigations', $args);

            // CSS customizations for section specific colors
            foreach ($nav_section_colors as $key => $colors)
            {
              // Create args array
              $args = array();
              // Set filename
              $args['file'] = $slide_nav_file.'.css';
              // Set selector
              $args['selector'] = 'body[class*="fp-viewing-'.$key.'"] .fp-slidesNav';

              // Check if main color is set
              if (isset($colors['main']))
              {
                $color = $this->getColorCodes($colors['main']);
                $args['color_main_enable'] = 'on';
                $args['main'] = $color['hex'];
                $args['main_rgba'] = $color['rgba'];
              }

              // Check if active color is set
              if (isset($colors['active']))
              {
                $color = $this->getColorCodes($colors['active']);
                $args['color_active_enable'] = 'on';
                $args['active'] = $color['hex'];
                $args['active_rgba'] = $color['rgba'];
              }

              // Check if hover color is set
              if (isset($colors['hover']))
              {
                $color = $this->getColorCodes($colors['hover']);
                $args['color_hover_enable'] = 'on';
                $args['hover'] = $color['hex'];
                $args['hover_rgba'] = $color['rgba'];
              }

              // Load navigation style with parameters
              $customizations[] = $this->getAsset('navigations', $args);
            }
          }

          // controlArrows
          $parameters[] = 'controlArrows:'.$this->is_field_on($this->id_ControlArrows);

          // lockAnchors
          $parameters[] = 'lockAnchors:'.$this->is_field_on($this->id_LockAnchors);
          // anchors
          if (!empty($anchors))
          {
            $parameters[] = 'anchors:["'.implode('", "', $anchors).'"]';
          }

          // animateAnchor
          $parameters[] = 'animateAnchor:'.$this->is_field_on($this->id_AnimateAnchor);
          // keyboardScrolling
          $parameters[] = 'keyboardScrolling:'.$this->is_field_on($this->id_KeyboardScrolling);
          // recordHistory
          $parameters[] = 'recordHistory:'.$this->is_field_on($this->id_RecordHistory);
        }

        // ****************************************************************************************
        // Scrolling parameters
        {
          // autoScrolling
          $parameters[] = 'autoScrolling:'.$this->is_field_on($this->id_AutoScrolling);
          // fitToSection
          $parameters[] = 'fitToSection:'.$this->is_field_on($this->id_FitToSection);
          // fitToSectionDelay
          $parameters[] = 'fitToSectionDelay:'.$this->get_field_value($this->id_FitToSectionDelay, '1000');
          // scrollBar
          $parameters[] = 'scrollBar:'.$this->is_field_on($this->id_ScrollBar);

          // scrollOverflow
          $parameters[] = 'scrollOverflow:'.$this->is_field_on($this->id_ScrollOverflow);
          if ( $this->is_field_enabled($this->id_ScrollOverflow) )
          {
            // scrollOverflowOptions
            $scrollOverflowOptions = array();
            if ( $this->is_field_enabled($this->id_ScrollOverflowHideScrollbars) )
            {
              $scrollOverflowOptions[] = 'scrollbars: false';
            }
            if ( $this->is_field_enabled($this->id_ScrollOverflowFadeScrollbars) )
            {
              $scrollOverflowOptions[] = 'fadeScrollbars: true';
            }
            if ( $this->is_field_enabled($this->id_ScrollOverflowInteractiveScrollbars) )
            {
              $scrollOverflowOptions[] = 'interactiveScrollbars: true';
            }
            if (!empty($scrollOverflowOptions))
            {
              $scrollOverflowOptions = implode(',', array_filter($scrollOverflowOptions));
              $parameters[] = 'scrollOverflowOptions: {'.$scrollOverflowOptions.'}';
            }
          }

          // bigSectionsDestination
          $bigSectionsDestination = $this->get_field_value($this->id_BigSectionsDestination, 'default');
          if ($bigSectionsDestination != 'default')
          {
            $parameters[] = 'bigSectionsDestination:"'.$bigSectionsDestination.'"';
          }

          // continuousVertical, loopBottom, loopTop
          if ($this->is_field_enabled($this->id_ContinuousVertical))
          {
            $parameters[] = 'continuousVertical:true';
            $parameters[] = 'loopBottom:false';
            $parameters[] = 'loopTop:false';
          }
          else
          {
            $parameters[] = 'continuousVertical:false';
            $parameters[] = 'loopBottom:'.$this->is_field_on($this->id_LoopBottom);
            $parameters[] = 'loopTop:'.$this->is_field_on($this->id_LoopTop);
          }

          // loopHorizontal
          $parameters[] = 'loopHorizontal:'.$this->is_field_on($this->id_LoopHorizontal);
          // scrollingSpeed
          $parameters[] = 'scrollingSpeed:'.$this->get_field_value($this->id_ScrollingSpeed, '700');

          // css3, easingcss3, easing
          $easing = $this->get_field_value($this->id_Easing, 'css3_ease');
          if (substr($easing, 0, 5) == 'css3_')
          {
            $easing = substr($easing, 5, strlen($easing));
            $parameters[] = 'css3:true';
            $parameters[] = 'easingcss3:"'.$easing.'"';
            $parameters[] = 'easing:"easeInOutCubic"';
          }
          else if (substr($easing, 0, 3) == 'js_')
          {
            $easing = substr($easing, 3, strlen($easing));
            $parameters[] = 'css3:false';
            $parameters[] = 'easingcss3:"ease"';
            $parameters[] = 'easing:"'.$easing.'"';
          }
        }

        // ****************************************************************************************
        // Design parameters
        {
          // verticalCentered
          $parameters[] = 'verticalCentered:'.$this->is_field_on($this->id_VerticalCentered);
          // responsiveWidth
          $parameters[] = 'responsiveWidth:'.$this->get_field_value($this->id_ResponsiveWidth, '0');
          // responsiveHeight
          $parameters[] = 'responsiveHeight:'.$this->get_field_value($this->id_ResponsiveHeight, '0');
          // paddingTop
          $parameters[] = 'paddingTop: (typeof mcwPaddingTop != "undefined") ? mcwPaddingTop : "'.$this->get_field_value($this->id_PaddingTop, '0px').'"';
          // paddingBottom
          $parameters[] = 'paddingBottom:"'.$this->get_field_value($this->id_PaddingBottom, '0px').'"';
          // fixedElements
          $fe = array_filter( explode( ',', $this->get_field_value($this->id_FixedElements, '') ) );
          $fixed_elements = array_merge($fixed_elements, $fe);
          // Add fixed elements
          $parameters[] = 'fixedElements:"'.implode(',', $fixed_elements).'"';
        }

        // ****************************************************************************************
        // Customization on events
        {
          // Extra parameters
          $parameters[] = $this->get_field_value($this->id_ExtraParameters, '');

          // VC animations customization
          if ( $this->is_field_enabled($this->id_cust_enableVCAnim) )
          {
            $customizations[] = $this->getAsset('vc_anim');
            if ( $this->is_field_enabled($this->id_cust_enableVCAnimReset) )
            {
              $customizations[] = $this->getAsset('vc_anim_reset');
            }
          }
          // Force remove margins customization
          if ( $this->is_field_enabled($this->id_cust_forceRemoveThemeMargins) )
          {
            $customizations[] = $this->getAsset('theme_remove_margins');
          }
          // Video autoplay customization
          if ( $this->is_field_enabled($this->id_cust_videoautoplay) )
          {
            $customizations[] = $this->getAsset('video_autoplay', array('selector' => '#'.$this->an_fullpage.' '.$section_selector));
          }
          // Force fixed theme header
          if ( $this->is_field_enabled($this->id_cust_forceFixedThemeHeader) )
          {
            $sel = $this->get_field_value($this->id_cust_forceFixedThemeHeaderSelector);
            if (!empty($sel))
            {
              $customizations[] = $this->getAsset('theme_header_fixed', array('header' => $sel, 'selector' => '#'.$this->an_fullpage.' '.$section_selector));
            }
          }
        }

        // ****************************************************************************************
        // Default event function codes
        {
          $events_default = array(
            'afterLoad' => 'function(anchorLink, index){}',
            'onLeave' => 'function(index, nextIndex, direction){}',
            'afterRender' => 'function(){}',
            'afterResize' => 'function(){}',
            'afterSlideLoad' => 'function(anchorLink, index, slideAnchor, slideIndex){}',
            'onSlideLeave' => 'function(anchorLink, index, slideIndex, direction, nextSlideIndex){}',
            'afterResponsive' => 'function(isResponsive){}',
          );
          $before_fullpage = '';
          $after_fullpage = '';

          // afterLoad event
          if ( $this->is_field_enabled($this->id_afterLoadEnable) )
          {
            $parameters['afterLoad'] = 'afterLoad: '.$this->get_field_value($this->id_evt_afterLoad, $events_default['afterLoad']);
          }
          // onLeave event
          if ( $this->is_field_enabled($this->id_onLeaveEnable) )
          {
            $parameters['onLeave'] = 'onLeave: '.$this->get_field_value($this->id_evt_onLeave, $events_default['onLeave']);
          }
          // afterRender event
          if ( $this->is_field_enabled($this->id_afterRenderEnable) )
          {
            $parameters['afterRender'] = 'afterRender: '.$this->get_field_value($this->id_evt_afterRender, $events_default['afterRender']);
          }
          // afterResize event
          if ( $this->is_field_enabled($this->id_afterResizeEnable) )
          {
            $parameters['afterResize'] = 'afterResize: '.$this->get_field_value($this->id_evt_afterResize, $events_default['afterResize']);
          }
          // afterSlideLoad event
          if ( $this->is_field_enabled($this->id_afterSlideLoadEnable) )
          {
            $parameters['afterSlideLoad'] = 'afterSlideLoad: '.$this->get_field_value($this->id_evt_afterSlideLoad, $events_default['afterSlideLoad']);
          }
          // onSlideLeave event
          if ( $this->is_field_enabled($this->id_onSlideLeaveEnable) )
          {
            $parameters['onSlideLeave'] = 'onSlideLeave: '.$this->get_field_value($this->id_evt_onSlideLeave, $events_default['onSlideLeave']);
          }
          // afterResponsive event
          if ( $this->is_field_enabled($this->id_afterresponsive) )
          {
            $parameters['afterResponsive'] = 'afterResponsive: '.$this->get_field_value($this->id_evt_afterresponsive, $events_default['afterResponsive']);
          }
          // beforeFullPage event
          if ( $this->is_field_enabled($this->id_beforefullpage) )
          {
            $before_fullpage = $this->get_field_value($this->id_evt_beforefullpage, '');
          }
          // afterFullPage event
          if ( $this->is_field_enabled($this->id_afterfullpage) )
          {
            $after_fullpage = $this->get_field_value($this->id_evt_afterfullpage, '');
          }
        }

        // ****************************************************************************************
        // Customization code
        if (!empty($customizations))
        {
          foreach ($customizations as $events)
          {
            if (!empty($events))
            {
              foreach ($events as $key => $js)
              {
                switch ($key)
                {
                  case 'before':
                    $before_fullpage = $js.$before_fullpage;
                    break;

                  case 'after':
                    $after_fullpage = $js.$after_fullpage;
                    break;

                  case 'css':
                    $css .= $js;
                    break;

                  default:
                    if (isset($parameters[$key]))
                    {
                      // Add js after the bracket
                      $parameters[$key] = substr_replace($parameters[$key], $js, strpos($parameters[$key], "{") + 1, 0);
                    }
                    else
                    {
                      $parameters[$key] = $key.": ".substr_replace($events_default[$key], $js, strpos($events_default[$key], "{") + 1, 0);
                    }
                    break;
                }
              }
            }
          }
        }

        // Merge parameters
        $parameters = implode(',', array_filter($parameters));

        // Echo script
        $this->fullPageJSInitCode = '<script type="text/javascript">
        jQuery(document).ready(function($){'.$before_fullpage.'
          $("#'.$this->an_fullpage.'").fullpage({'.$parameters.'});
          $(window).resize(function(){$.fn.fullpage.reBuild();});
        '.$after_fullpage.'});
        </script>';

        // Add fullPage JS initialize code to the header
        if ( !$this->is_field_enabled($this->id_FooterCode) )
        {
          echo $this->fullPageJSInitCode;
        }

        // Echo CSS
        if (!empty($css))
        {
          echo '<style type="text/css">'.$css.'</style>';
        }
      }
    }

    // Adds full page js initialization code to the footer if enabled
    // Called by wp_footer action
    public function on_wp_footer()
    {
      global $post;
      if (!isset($post))
        return;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Add fullPage JS initialize code to the footer
        if ( $this->is_field_enabled($this->id_FooterCode) )
        {
          echo $this->fullPageJSInitCode;
        }
      }
    }

    // Adds full page wrapper to the content
    // Called by the_content filter
    public function on_the_content($content)
    {
      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Add full page div wrapper
        $content = '<div id="'.$this->an_fullpage.'">'.$content.'</div>';
      }
      // Return full page content
      return $content;
    }

    // Called by template_redirect action
    public function on_template_redirect()
    {
      global $post;
      if (!isset($post))
        return;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Check if template is enabled
        if ( $this->is_field_enabled($this->id_EnableTemplate) )
        {
          // Check if template redirect is enabled
          if ( $this->is_field_enabled($this->id_TemplateRedirect) )
          {
            $path = trim( $this->get_field_value($this->id_TemplatePath, '') );

            if ($path == '')
            {
              $path = plugin_dir_path(__FILE__).'template/mcw_fullpage_template.php';
            }
            include($path);
            exit();
          }
        }
      }
    }

    // Called by template_include filter
    public function on_template_include($original_template)
    {
      global $post;
      if (!isset($post))
        return $original_template;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Check if template is enabled
        if ( $this->is_field_enabled($this->id_EnableTemplate) )
        {
          // Check if template redirect is disabled
          if ( $this->is_field_enabled($this->id_TemplateRedirect) == false )
          {
            $path = trim( $this->get_field_value($this->id_TemplatePath, '') );

            if ($path == '')
            {
              $path = plugin_dir_path(__FILE__).'template/mcw_fullpage_template.php';
            }

            return $path;
          }
        }
      }

      return $original_template;
    }

    // Remove unwanted JS from header
    // Called by wp_print_scripts action
    public function on_wp_print_scripts()
    {
      // Get post
      global $post;
      // Get global scripts
      global $wp_scripts;

      if (!isset($post))
        return;

      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Check if remove theme js is enabled
        if ( $this->is_field_enabled($this->id_RemoveThemeJS) )
        {
          // Error handling
          if (isset($wp_scripts) && isset($wp_scripts->registered))
          {
            // Get theme URL
            $themeUrl = get_bloginfo('template_directory');

            // Remove theme related scripts
            foreach ($wp_scripts->registered as $key=>$script)
            {
              if (isset($script->src))
              {
                if (stristr($script->src, $themeUrl) !== false)
                {
                  // Remove theme js
                  unset($wp_scripts->registered[$key]);
                  // Remove from queue
                  if (isset($wp_scripts->queue))
                  {
                    $wp_scripts->queue = array_diff($wp_scripts->queue, array($key));
                    $wp_scripts->queue = array_values($wp_scripts->queue);
                  }
                }
              }
            }
          }
        }

        // Check if remove js is enabled
        $removeJS = array_filter( explode( ',', $this->get_field_value($this->id_RemoveJS, '') ) );
        if ( isset($removeJS) && is_array($removeJS) && !empty($removeJS) )
        {
          // Error handling
          if (isset($wp_scripts) && isset($wp_scripts->registered))
          {
            // Remove scripts
            foreach ($wp_scripts->registered as $key=>$script)
            {
              if (isset($script->src))
              {
                foreach ($removeJS as $remove)
                {
                  if (!isset($remove))
                    continue;
                  // Trim js
                  $remove = trim($remove);
                  // Check if script includes the removed JS
                  if (stristr($script->src, $remove) !== false)
                  {
                    // Remove js
                    unset($wp_scripts->registered[$key]);
                    // Remove from queue
                    if (isset($wp_scripts->queue))
                    {
                      $wp_scripts->queue = array_diff($wp_scripts->queue, array($key));
                      $wp_scripts->queue = array_values($wp_scripts->queue);
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    // Called by body_class filter
    public function on_body_class($classes)
    {
      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // Add big navigation styles class
        if ( $this->is_field_enabled($this->id_BigSectionNavigation) )
        {
          $classes[] = 'fp-big-nav';
        }
        if ( $this->is_field_enabled($this->id_BigSlideNavigation) )
        {
          $classes[] = 'fp-big-slide-nav';
        }
      }
      return $classes;
    }

    // Adds section class to the vc_row tag in visual composer
    // Called by VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG (vc_shortcodes_css_class) filter
    public function on_vc_custom_css($class, $tag)
    {
      // Check if fullpage is enabled
      if ( $this->is_field_enabled($this->id_fullPageEnable) )
      {
        // If tag is row and full page is enabled, add section class
        if ($tag == 'vc_row')
        {
          $class .= ' '.$this->cn_section;
        }
        else if ($tag == 'vc_column')
        {
          $class .= ' '.$this->cn_slide;
        }
      }
      // Return class
      return $class;
    }

    // Change shortcode output if nececssary
    // Called by vc_shortcode_output filter
    public function on_vc_shortcode_output($output, $obj, $atts)
    {
      // Full page enabled, so add a full page wrapper
      if ( $obj->settings('base')=='vc_row' )
      {
        // Check if fullpage is enabled
        if ( $this->is_field_enabled($this->id_fullPageEnable) )
        {
          // Check if fixed top is on
          if ((isset($atts[$this->vc_SectionBehaviour])) && ($atts[$this->vc_SectionBehaviour] == 'fixed_top'))
          {
            $output = str_replace($this->cn_section, $this->cn_fixed_top, $output);
          }
          // Check if fixed top is on
          else if ( (isset($atts[$this->vc_SectionBehaviour])) && ($atts[$this->vc_SectionBehaviour] == 'fixed_bottom') )
          {
            $output = str_replace($this->cn_section, $this->cn_fixed_bottom, $output);
          }
          else
          {
            // Disable scrollbars if checked
            if ( (isset($atts[$this->vc_NoScrollbar])) && ($atts[$this->vc_NoScrollbar] == 'true') )
            {
              $output = str_replace($this->cn_section, $this->cn_section.' fp-noscroll', $output);
            }

            // Check if autoheight is on
            if ( (isset($atts[$this->vc_SectionBehaviour])) && ($atts[$this->vc_SectionBehaviour] == 'on') )
            {
              $output = str_replace($this->cn_section, $this->cn_section.' fp-auto-height', $output);
            }

            // Check if responsive autoheight is on
            if ( (isset($atts[$this->vc_SectionBehaviour])) && ($atts[$this->vc_SectionBehaviour] == 'responsive') )
            {
              $output = str_replace($this->cn_section, $this->cn_section.' fp-auto-height-responsive', $output);
            }
          }

          // Check if colums as slides is checked
          if ( (isset($atts[$this->vc_ColumnSlides])) && ($atts[$this->vc_ColumnSlides] == 'true') )
          {
          }
          else
          {
            // Remove slide class from column since it is not wanted
            $output = str_replace($this->cn_slide, '', $output);
          }
        }
      }
      // Return output
      return $output;
    }

    // Creates full page meta box with parameters
    protected function init_meta_box()
    {
      // Check if meta box class exists
      if (!class_exists('MCW_MetaBox'))
        return;

      // Get visual composer active post types
      if (function_exists('vc_editor_post_types'))
      {
        $post_types = vc_editor_post_types();
      }
      // Check if it is empty
      if (empty($post_types))
      {
        $post_types = array('page');
      }

      // Enable full page section
      $full_page_enable_section = array(
        'type' => 'section',
        'fields' => array(
          array(
            'label' => __('Enable Full Page', $this->tag),
            'id' => $this->id_fullPageEnable,
            'type' => 'checkbox',
            'description' => __('This parameter enables full page on this post.', $this->tag),
          ),
        ),
      );

      // Navigation accordion
      // TODO: Missing fields
      // menu
      $nav_accordion_fields = array(
        'title' => __('Navigation', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // navigation, navigationPosition
          array(
            'label' => __('Section Navigation', $this->tag),
            'id' => $this->id_Navigation,
            'type' => 'selectbox',
            'options' => array(
              'off' => __('Off', $this->tag),
              'left' => __('Left', $this->tag),
              'right' => __('Right', $this->tag),
            ),
            'value' => 'off',
            'description' => __('This parameter determines the position of navigation bar.', $this->tag),
          ),
          // Section Navigation Style
          array(
            'label' => __('Section Navigation Style', $this->tag),
            'id' => $this->id_SectionNavigationStyle,
            'type' => 'selectbox',
            'options' => array(
              'default' => __('Default', $this->tag),
              'circles' => __('Circles', $this->tag),
              'circles-inverted' => __('Circles Inverted', $this->tag),
              'expanding-circles' => __('Expanding Circles', $this->tag),
              'filled-circles' => __('Filled Circles', $this->tag),
              'filled-circle-within' => __('Filled Circles Within', $this->tag),
              'multiple-circles' => __('Multiple Circles', $this->tag),
              'rotating-circles' => __('Rotating Circles', $this->tag),
              'rotating-circles2' => __('Rotating Circles 2', $this->tag),
              'squares' => __('Squares', $this->tag),
              'squares-border' => __('Squares Border', $this->tag),
              'expanding-squares' => __('Expanding Squares', $this->tag),
              'filled-squares' => __('Filled Squares', $this->tag),
              'multiple-squares' => __('Multiple Squares', $this->tag),
              'squares-to-rombs' => __('Squares to Rombs', $this->tag),
              'multiple-squares-to-rombs' => __('Multiple Squares to Rombs', $this->tag),
              'filled-rombs' => __('Filled Rombs', $this->tag),
              'filled-bars' => __('Filled Bars', $this->tag),
              'story-telling' => __('Story Telling', $this->tag),
              'crazy-text-effect' => __('Crazy Text Effect', $this->tag),
            ),
            'value' => 'default',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter determines section navigation style.', $this->tag),
          ),
          // Main color
          array(
            'label' => __('Main Color', $this->tag),
            'id' => $this->id_SectionColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the color of bullets on sections. Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // Hover color
          array(
            'label' => __('Hover Color', $this->tag),
            'id' => $this->id_SectionHoverColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the hover color of bullets on sections. This color may not be used in some of the navigation styles.  Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // Active color
          array(
            'label' => __('Active Color', $this->tag),
            'id' => $this->id_SectionActiveColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the active color of bullets on sections. This color may not be used in some of the navigation styles.  Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // tooltipBackground
          array(
            'label' => __('Tooltip Background Color', $this->tag),
            'id' => $this->id_TooltipBackground,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('The background color of the navigation tooltip. (example: #e5e5e5 or rgba(229, 229, 229, 0.5))', $this->tag),
          ),
          // tooltipColor
          array(
            'label' => __('Tooltip Text Color', $this->tag),
            'id' => $this->id_TooltipColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('The text color of the navigation tooltip. (example: #000000)', $this->tag),
          ),
          // showActiveTooltip
          array(
            'label' => __('Show Active Tooltip', $this->tag),
            'id' => $this->id_ShowActiveTooltip,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter shows a persistent tooltip for the actively viewed section in the vertical navigation.', $this->tag),
          ),
          // big navigation styles
          array(
            'label' => __('Bigger Navigation', $this->tag),
            'id' => $this->id_BigSectionNavigation,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_Navigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets bigger navigation bullets.', $this->tag),
          ),
          // slidesNavigation, slidesNavPosition
          array(
            'label' => __('Slides Navigation', $this->tag),
            'id' => $this->id_SlideNavigation,
            'type' => 'selectbox',
            'options' => array(
              'off' => __('Off', $this->tag),
              'top' => __('Top', $this->tag),
              'bottom' => __('Bottom', $this->tag),
            ),
            'value' => 'off',
            'description' => __('This parameter determines the position of landscape navigation bar for sliders.', $this->tag),
          ),
          // Slide Navigation Style
          array(
            'label' => __('Slide Navigation Style', $this->tag),
            'id' => $this->id_SlideNavigationStyle,
            'type' => 'selectbox',
            'options' => array(
              'section_nav' => __('Same with Section Navigation Style', $this->tag),
              'default' => __('Default', $this->tag),
              'circles' => __('Circles', $this->tag),
              'circles-inverted' => __('Circles Inverted', $this->tag),
              'expanding-circles' => __('Expanding Circles', $this->tag),
              'filled-circles' => __('Filled Circles', $this->tag),
              'filled-circle-within' => __('Filled Circles Within', $this->tag),
              'multiple-circles' => __('Multiple Circles', $this->tag),
              'rotating-circles' => __('Rotating Circles', $this->tag),
              'rotating-circles2' => __('Rotating Circles 2', $this->tag),
              'squares' => __('Squares', $this->tag),
              'squares-border' => __('Squares Border', $this->tag),
              'expanding-squares' => __('Expanding Squares', $this->tag),
              'filled-squares' => __('Filled Squares', $this->tag),
              'multiple-squares' => __('Multiple Squares', $this->tag),
              'squares-to-rombs' => __('Squares to Rombs', $this->tag),
              'multiple-squares-to-rombs' => __('Multiple Squares to Rombs', $this->tag),
              'filled-rombs' => __('Filled Rombs', $this->tag),
              'filled-bars' => __('Filled Bars', $this->tag),
            ),
            'value' => 'default',
            'dependency' => array( array('controller' => $this->id_SlideNavigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter determines section navigation style.', $this->tag),
          ),
          // Main color
          array(
            'label' => __('Main Color', $this->tag),
            'id' => $this->id_SlideColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_SlideNavigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the color of bullets on slides. Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // Hover color
          array(
            'label' => __('Hover Color', $this->tag),
            'id' => $this->id_SlideHoverColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_SlideNavigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the hover color of bullets on slides. This color may not be used in some of the navigation styles.  Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // Active color
          array(
            'label' => __('Active Color', $this->tag),
            'id' => $this->id_SlideActiveColor,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_SlideNavigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets the active color of bullets on slides. This color may not be used in some of the navigation styles.  Leave empty for the default color. (Only hex colors such as #DD3333)', $this->tag),
          ),
          // big navigation styles
          array(
            'label' => __('Bigger Slide Navigation', $this->tag),
            'id' => $this->id_BigSlideNavigation,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_SlideNavigation, 'condition' => '!=', 'value' => 'off') ),
            'level' => '1',
            'description' => __('This parameter sets bigger slide navigation bullets .', $this->tag),
          ),
          // controlArrows
          array(
            'label' => __('Control Arrows', $this->tag),
            'id' => $this->id_ControlArrows,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter determines whether to use control arrows for the slides to move right or left.', $this->tag),
          ),
          // lockAnchors
          array(
            'label' => __('Lock Anchors', $this->tag),
            'id' => $this->id_LockAnchors,
            'type' => 'checkbox',
            'description' => __('This parameter determines whether anchors in the URL will have any effect.', $this->tag),
          ),
          // animateAnchor
          array(
            'label' => __('Animate Anchor', $this->tag),
            'id' => $this->id_AnimateAnchor,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter defines whether the load of the site when given anchor (#) will scroll with animation to its destination.', $this->tag),
          ),
          // keyboardScrolling
          array(
            'label' => __('Keyboard Scrolling', $this->tag),
            'id' => $this->id_KeyboardScrolling,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter defines if the content can be navigated using the keyboard.', $this->tag),
          ),
          // recordHistory
          array(
            'label' => __('Record History', $this->tag),
            'id' => $this->id_RecordHistory,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter defines whether to push the state of the site to the browsers history, so back button will work on section navigation.', $this->tag),
          ),
        ),
      );

      // Scrolling accordion
      // TODO: Missing fields
      // normalScrollElements
      // touchSensitivity
      // normalScrollElementTouchThreshold
      $scrolling_accordion_fields = array(
        'title' => __('Scrolling', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // autoScrolling
          array(
            'label' => __('Auto Scrolling', $this->tag),
            'id' => $this->id_AutoScrolling,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter defines whether to use the automatic scrolling or the normal one.', $this->tag),
          ),
          // fitToSection
          array(
            'label' => __('Fit To Section', $this->tag),
            'id' => $this->id_FitToSection,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter determines whether or not to fit sections to the viewport or not.', $this->tag),
          ),
          // fitToSectionDelay
          array(
            'label' => __('Fit To Section Delay', $this->tag),
            'id' => $this->id_FitToSectionDelay,
            'type' => 'textbox',
            'value' => '1000',
            'level' => '1',
            'dependency' => array( array('controller' => $this->id_FitToSection, 'condition' => '==', 'value' => true) ),
            'description' => __('The delay in miliseconds for section fitting.', $this->tag),
          ),
          // scrollBar
          array(
            'label' => __('Scroll Bar', $this->tag),
            'id' => $this->id_ScrollBar,
            'type' => 'checkbox',
            'description' => __('This parameter determines whether to use the scrollbar for the site or not.', $this->tag),
          ),
          // scrollOverflow
          array(
            'label' => __('Scroll Overflow', $this->tag),
            'id' => $this->id_ScrollOverflow,
            'type' => 'checkbox',
            'description' => __('This parameter defines whether or not to create a scroll for the section in case the content is bigger than the height of it.', $this->tag),
          ),
          // scrollOverflow / scrollbars
          array(
            'label' => __('Hide Scrollbars', $this->tag),
            'id' => $this->id_ScrollOverflowHideScrollbars,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_ScrollOverflow, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('This parameter hides scrollbar even if the scrolling is enabled inside the sections.', $this->tag),
          ),
          // scrollOverflow / fadeScrollbars
          array(
            'label' => __('Fade Scrollbars', $this->tag),
            'id' => $this->id_ScrollOverflowFadeScrollbars,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_ScrollOverflow, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('This parameter fades scrollbar when unused.', $this->tag),
          ),
          // scrollOverflow / fadeScrollbars
          array(
            'label' => __('Interactive Scrollbars', $this->tag),
            'id' => $this->id_ScrollOverflowInteractiveScrollbars,
            'type' => 'checkbox',
            'value' => 'on',
            'dependency' => array( array('controller' => $this->id_ScrollOverflow, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('This parameter makes scrollbar draggable and user can interact with it.', $this->tag),
          ),
          // bigSectionsDestination
          array(
            'label' => __('Big Sections Destination', $this->tag),
            'id' => $this->id_BigSectionsDestination,
            'type' => 'selectbox',
            'options' => array(
              'default' => __('Default', $this->tag),
              'top' => __('Top', $this->tag),
              'bottom' => __('Bottom', $this->tag),
            ),
            'value' => 'default',
            'description' => __('This parameter defines how to scroll to a section which size is bigger than the viewport.', $this->tag),
          ),
          // continuousVertical
          array(
            'label' => __('Continuous Vertical', $this->tag),
            'id' => $this->id_ContinuousVertical,
            'type' => 'checkbox',
            'description' => __('This parameter determines vertical scrolling is continuous.', $this->tag),
          ),
          // loopBottom
          array(
            'label' => __('Loop Bottom', $this->tag),
            'id' => $this->id_LoopBottom,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_ContinuousVertical, 'condition' => '==', 'value' => false) ),
            'level' => '1',
            'description' => __('This parameter determines whether to use the scrollbar for the site or not.', $this->tag),
          ),
          // loopTop
          array(
            'label' => __('Loop Top', $this->tag),
            'id' => $this->id_LoopTop,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_ContinuousVertical, 'condition' => '==', 'value' => false) ),
            'level' => '1',
            'description' => __('This parameter determines whether to use the scrollbar for the site or not.', $this->tag),
          ),

          // loopHorizontal
          array(
            'label' => __('Loop Slides', $this->tag),
            'id' => $this->id_LoopHorizontal,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter defines whether horizontal sliders will loop after reaching the last or previous slide or not.', $this->tag),
          ),
          // css3, easingcss3, easing
          array(
            'label' => __('Easing', $this->tag),
            'id' => $this->id_Easing,
            'type' => 'selectbox',
            'options' => array(
              'css3_ease' => __('CSS3 - Ease', $this->tag),
              'css3_linear' => __('CSS3 - Linear', $this->tag),
              'css3_ease-in' => __('CSS3 - Ease In', $this->tag),
              'css3_ease-out' => __('CSS3 - Ease Out', $this->tag),
              'css3_ease-in-out' => __('CSS3 - Ease In Out', $this->tag),
              'js_linear' => __('Linear', $this->tag),
              'js_swing' => __('Swing', $this->tag),
              'js_easeInQuad' => __('Ease In Quad', $this->tag),
              'js_easeOutQuad' => __('Ease Out Quad', $this->tag),
              'js_easeInOutQuad' => __('Ease In Out Quad', $this->tag),
              'js_easeInCubic' => __('Ease In Cubic', $this->tag),
              'js_easeOutCubic' => __('Ease Out Cubic', $this->tag),
              'js_easeInOutCubic' => __('Ease In Out Cubic', $this->tag),
              'js_easeInQuart' => __('Ease In Quart', $this->tag),
              'js_easeOutQuart' => __('Ease Out Quart', $this->tag),
              'js_easeInOutQuart' => __('Ease In Out Quart', $this->tag),
              'js_easeInQuint' => __('Ease In Quint', $this->tag),
              'js_easeOutQuint' => __('Ease Out Quint', $this->tag),
              'js_easeInOutQuint' => __('Ease In Out Quint', $this->tag),
              'js_easeInExpo' => __('Ease In Expo', $this->tag),
              'js_easeOutExpo' => __('Ease Out Expo', $this->tag),
              'js_easeInOutExpo' => __('Ease In Out Expo', $this->tag),
              'js_easeInSine' => __('Ease In Sine', $this->tag),
              'js_easeOutSine' => __('Ease Out Sine', $this->tag),
              'js_easeInOutSine' => __('Ease In Out Sine', $this->tag),
              'js_easeInCirc' => __('Ease In Circ', $this->tag),
              'js_easeOutCirc' => __('Ease Out Circ', $this->tag),
              'js_easeInOutCirc' => __('Ease In Out Circ', $this->tag),
              'js_easeInElastic' => __('Ease In Elastic', $this->tag),
              'js_easeOutElastic' => __('Ease Out Elastic', $this->tag),
              'js_easeInOutElastic' => __('Ease In Out Elastic', $this->tag),
              'js_easeInBack' => __('Ease In Back', $this->tag),
              'js_easeOutBack' => __('Ease Out Back', $this->tag),
              'js_easeInOutBack' => __('Ease In Out Back', $this->tag),
              'js_easeInBounce' => __('Ease In Bounce', $this->tag),
              'js_easeOutBounce' => __('Ease Out Bounce', $this->tag),
              'js_easeInOutBounce' => __('Ease In Out Bounce', $this->tag),
            ),
            'value' => 'css3_ease',
            'description' => __('This parameter determines the transition effect.', $this->tag),
          ),
          // scrollingSpeed
          array(
            'label' => __('Scrolling Speed', $this->tag),
            'id' => $this->id_ScrollingSpeed,
            'type' => 'textbox',
            'value' => '700',
            'description' => __('Speed in miliseconds for the scrolling transitions.', $this->tag),
          ),
        ),
      );

      // Design accordion
      $design_accordion_fields = array(
        'title' => __('Design', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // verticalCentered
          array(
            'label' => __('Vertically Centered', $this->tag),
            'id' => $this->id_VerticalCentered,
            'type' => 'checkbox',
            'value' => 'on',
            'description' => __('This parameter determines whether to center the content vertically.', $this->tag),
          ),
          // responsiveWidth
          array(
            'label' => __('Responsive Width', $this->tag),
            'id' => $this->id_ResponsiveWidth,
            'type' => 'textbox',
            'value' => '0',
            'description' => __('Normal scroll will be used under the defined width in pixels. (autoScrolling: false)', $this->tag),
          ),
          // responsiveHeight
          array(
            'label' => __('Responsive Height', $this->tag),
            'id' => $this->id_ResponsiveHeight,
            'type' => 'textbox',
            'value' => '0',
            'description' => __('Normal scroll will be used under the defined height in pixels. (autoScrolling: false)', $this->tag),
          ),
          // paddingTop
          array(
            'label' => __('Padding Top', $this->tag),
            'id' => $this->id_PaddingTop,
            'type' => 'textbox',
            'value' => '0px',
            'description' => __('Defines top padding for each section. Useful in case of using fixed header. (example: 10px, 10em)', $this->tag),
          ),
          // paddingBottom
          array(
            'label' => __('Padding Bottom', $this->tag),
            'id' => $this->id_PaddingBottom,
            'type' => 'textbox',
            'value' => '0px',
            'description' => __('Defines bottom padding for each section. Useful in case of using fixed footer. (example: 10px, 10em)', $this->tag),
          ),
          // fixedElements
          array(
            'label' => __('Fixed Elements', $this->tag),
            'id' => $this->id_FixedElements,
            'type' => 'textbox',
            'value' => '',
            'description' => __('Defines which elements will be taken off the scrolling structure of the plugin which is necessary when using the keep elements fixed with css. Enter comma seperated element selectors.(example: #element1, .element2)', $this->tag),
          ),
        ),
      );

      // Customizations accordion
      $customizations_accordion_fields = array(
        'title' => __('Customizations', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // Extra Parameters
          array(
            'label' => __('Extra Parameters', $this->tag),
            'id' => $this->id_ExtraParameters,
            'type' => 'textbox',
            'description' => __('If there are parameters you want to include, add these parameters (comma seperated)<br>Example: parameter1:true,parameter2:15', $this->tag),
          ),
          // enable VC Animations
          array(
            'label' => __('Enable Visual Composer Animations', $this->tag),
            'id' => $this->id_cust_enableVCAnim,
            'type' => 'checkbox',
            'description' => __('This parameter enables visual composer animations. (This may not work in some cases, and visual composer addon animations may not be supported.)', $this->tag),
          ),
          // enable VC Animations
          array(
            'label' => __('Enable VC Animation Reset', $this->tag),
            'id' => $this->id_cust_enableVCAnimReset,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_cust_enableVCAnim, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('This parameter enables resetting visual composer animations on section and slide load. (This may not work in some cases, and visual composer addon animations may not be supported.)', $this->tag),
          ),
          // Video fix
          array(
            'label' => __('Video Autoplay', $this->tag),
            'id' => $this->id_cust_videoautoplay,
            'type' => 'checkbox',
            'description' => __('This parameter plays the videos (HTML5 and Youtube) only when the section is in view and stops it otherwise.', $this->tag),
          ),
          // Force remove theme margins
          array(
            'label' => __('Force Remove Theme Margins', $this->tag),
            'id' => $this->id_cust_forceRemoveThemeMargins,
            'type' => 'checkbox',
            'description' => __('This parameter forces to remove theme wrapper margins and paddings.', $this->tag),
          ),
          // Force theme header fixed
          array(
            'label' => __('Force Fixed Theme Header', $this->tag),
            'id' => $this->id_cust_forceFixedThemeHeader,
            'type' => 'checkbox',
            'description' => __('This parameter forces to make theme header fixed on top.', $this->tag),
          ),
          // Theme Header Selector
          array(
            'label' => __('Force Fixed Theme Header', $this->tag),
            'id' => $this->id_cust_forceFixedThemeHeaderSelector,
            'type' => 'textbox',
            'value' => '',
            'level' => '1',
            'dependency' => array( array('controller' => $this->id_cust_forceFixedThemeHeader, 'condition' => '==', 'value' => true) ),
            'description' => __('This parameter is the theme header CSS selector. (Example: .header)', $this->tag),
          ),
        ),
      );

      // Events accordion
      $events_accordion_fields = array(
        'title' => __('Events', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // afterRender enable
          array(
            'label' => __('afterRender', $this->tag),
            'id' => $this->id_afterRenderEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired just after the structure of the page is generated.', $this->tag),
          ),
          // afterRender
          array(
            'id' => $this->id_evt_afterRender,
            'type' => 'textarea',
            'value' => 'function(){&#13;&#10;  // console.log("afterRender event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_afterRenderEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // afterResize enable
          array(
            'label' => __('afterResize', $this->tag),
            'id' => $this->id_afterResizeEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired after resizing the browsers window.', $this->tag),
          ),
          // afterResize
          array(
            'id' => $this->id_evt_afterResize,
            'type' => 'textarea',
            'value' => 'function(){&#13;&#10;  // console.log("afterResize event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_afterResizeEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // afterLoad enable
          array(
            'label' => __('afterLoad', $this->tag),
            'id' => $this->id_afterLoadEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired once the sections have been loaded, after the scrolling has ended.', $this->tag),
          ),
          // afterLoad
          array(
            'id' => $this->id_evt_afterLoad,
            'type' => 'textarea',
            'value' => 'function(anchorLink, index){&#13;&#10;  // var loadedSection = $(this);&#13;&#10;  // console.log("afterLoad event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_afterLoadEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // onLeave enable
          array(
            'label' => __('onLeave', $this->tag),
            'id' => $this->id_onLeaveEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired once the user leaves a section.', $this->tag),
          ),
          // onLeave
          array(
            'id' => $this->id_evt_onLeave,
            'type' => 'textarea',
            'value' => 'function(index, nextIndex, direction){&#13;&#10;  // var leavingSection = $(this);&#13;&#10;  // console.log("onLeave event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_onLeaveEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // afterSlideLoad enable
          array(
            'label' => __('afterSlideLoad', $this->tag),
            'id' => $this->id_afterSlideLoadEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired once the slide of a section has been loaded, after the scrolling has ended.', $this->tag),
          ),
          // afterSlideLoad
          array(
            'id' => $this->id_evt_afterSlideLoad,
            'type' => 'textarea',
            'value' => 'function(anchorLink, index, slideAnchor, slideIndex){&#13;&#10;  // var loadedSlide = $(this);&#13;&#10;  // console.log("afterSlideLoad event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_afterSlideLoadEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // onSlideLeave enable
          array(
            'label' => __('onSlideLeave', $this->tag),
            'id' => $this->id_onSlideLeaveEnable,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('Fired once the user leaves a slide to go another.', $this->tag),
          ),
          // onSlideLeave
          array(
            'id' => $this->id_evt_onSlideLeave,
            'type' => 'textarea',
            'value' => 'function(anchorLink, index, slideIndex, direction, nextSlideIndex){&#13;&#10;  // var leavingSlide = $(this);&#13;&#10;  // console.log("onSlideLeave event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_onSlideLeaveEnable, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // afterResponsive enable
          array(
            'label' => __('afterResponsive', $this->tag),
            'id' => $this->id_afterresponsive,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('The javascript code that runs after normal mode is changed to responsive mode or responsive mode is changed to normal mode.', $this->tag),
          ),
          // afterResponsive
          array(
            'id' => $this->id_evt_afterresponsive,
            'type' => 'textarea',
            'value' => 'function(isResponsive){&#13;&#10;  // console.log("afterResponsive event fired.");&#13;&#10;}',
            'dependency' => array( array('controller' => $this->id_afterresponsive, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // Before FullPage enable
          array(
            'label' => __('Before FullPage', $this->tag),
            'id' => $this->id_beforefullpage,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('The javascript code that runs right after document is ready and before fullpage is called.', $this->tag),
          ),
          // Before FullPage
          array(
            'id' => $this->id_evt_beforefullpage,
            'type' => 'textarea',
            'value' => '// console.log("Before FullPage!");',
            'dependency' => array( array('controller' => $this->id_beforefullpage, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
          // After FullPage enable
          array(
            'label' => __('After FullPage', $this->tag),
            'id' => $this->id_afterfullpage,
            'type' => 'checkbox',
            'value' => 'off',
            'description' => __('The javascript code that runs right after document is ready and after fullpage is called.', $this->tag),
          ),
          // After FullPage
          array(
            'id' => $this->id_evt_afterfullpage,
            'type' => 'textarea',
            'value' => '// console.log("After FullPage!");',
            'dependency' => array( array('controller' => $this->id_afterfullpage, 'condition' => '==', 'value' => true) ),
            'class' => 'mcw_raw',
          ),
        ),
      );

      // Advanced accordion
      $advanced_accordion_fields = array(
        'title' => __('Advanced', $this->tag),
        'type' => 'accordion',
        'dependency' => array( array('controller' => $this->id_fullPageEnable, 'condition' => '==', 'value' => true) ),
        'fields' => array(
          // Add FullPage JS to Footer
          array(
            'label' => __('FullPage JS to Footer', $this->tag),
            'id' => $this->id_FooterCode,
            'type' => 'checkbox',
            'description' => __('Enable if you want FullPage JS code at the footer. FullPage JS code is at the header by default.', $this->tag),
          ),
          // enableTemplate
          array(
            'label' => __('Enable Empty Page Template', $this->tag),
            'id' => $this->id_EnableTemplate,
            'type' => 'checkbox',
            'description' => __('This parameter defines if page will be redirected to the defined template. The template is independent from the theme and is an empty page template if not defined.', $this->tag),
          ),
          // templateRedirect
          array(
            'label' => __('Use Template Redirect', $this->tag),
            'id' => $this->id_TemplateRedirect,
            'type' => 'checkbox',
            'dependency' => array( array('controller' => $this->id_EnableTemplate, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('This parameter defines if template will be redirected or included. If set, template will be redirected, otherwise template will be included. Play with this setting to see the best scenario that fits.', $this->tag),
          ),
          // Template Path
          array(
            'label' => __('Template Path', $this->tag),
            'id' => $this->id_TemplatePath,
            'type' => 'textbox',
            'dependency' => array( array('controller' => $this->id_EnableTemplate, 'condition' => '==', 'value' => true) ),
            'level' => '1',
            'description' => __('If you want to use your own template, put the template path and template name here. If left empty, an empty predefined page template will be used.<br>Example: '.get_home_path().'my_template.php', $this->tag),
          ),
          // Remove theme JS
          array(
            'label' => __('Remove Theme JS', $this->tag),
            'id' => $this->id_RemoveThemeJS,
            'type' => 'checkbox',
            'description' => __('This parameter removes theme javascript from output. Be aware, this might crash the page output if the theme has JS output on the head section.', $this->tag),
          ),
          // Remove JS
          array(
            'label' => __('Remove JS', $this->tag),
            'id' => $this->id_RemoveJS,
            'type' => 'textbox',
            'description' => __('This parameter removes specified javascript from output. Be aware, this might crash the page output. Write javascript names with comma in between.', $this->tag),
          ),
          // Section Selector
          array(
            'label' => __('Section Selector', $this->tag),
            'id' => $this->id_SectionSelector,
            'type' => 'textbox',
            'description' => __('This parameter changes section selector. Useful for themes that use customized Visual Composer. Example .wpb_row', $this->tag),
          ),
          // Slide Selector
          array(
            'label' => __('Slide Selector', $this->tag),
            'id' => $this->id_SlideSelector,
            'type' => 'textbox',
            'description' => __('This parameter changes slide selector. Useful for themes that use customized Visual Composer. Example: .wpb_column', $this->tag),
          ),
        ),
      );

      // Meta box groups array
      $groups = array($full_page_enable_section, $nav_accordion_fields, $scrolling_accordion_fields,
        $design_accordion_fields, $events_accordion_fields, $customizations_accordion_fields,
        $advanced_accordion_fields);

      // Create meta box
      $this->meta_box = new MCW_MetaBox($this->meta_box_id, __('Full Page Settings', $this->tag), $groups, $post_types);
    }

    // Visual composer admin interface, add full page tab parameters
    public function on_admin_init()
    {
      // Initialize meta box
      $this->init_meta_box();

      if(function_exists('vc_add_param'))
      {
        vc_add_param( 'vc_row', array(
          'type' => 'dropdown',
          'class' => '',
          'heading' => __('Section Behaviour', $this->tag),
          'param_name' => $this->vc_SectionBehaviour,
          'admin_label' => true,
          'value' => array(
            __('Full Height', $this->tag) => 'off',
            __('Auto Height', $this->tag) => 'on',
            __('Responsive Auto Height', $this->tag) => 'responsive',
            __('Top Fixed Header', $this->tag) => 'fixed_top',
            __('Bottom Fixed Footer', $this->tag) => 'fixed_bottom',
            ),
          'description' => __('Select section row behaviour.', $this->tag),
          'group' => $this->vcGroupName,
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'textfield',
          'class' => '',
          'heading' => __('Anchor', $this->tag),
          'param_name' => $this->vc_Anchor,
          'value' => '',
          'description' => __('Enter an anchor (ID).', $this->tag),
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'group' => $this->vcGroupName,
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'textfield',
          'class' => '',
          'heading' => __('Tooltip', $this->tag),
          'param_name' => $this->vc_Tooltip,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'checkbox',
          'class' => '',
          'heading' => __('Columns as Slides', $this->tag),
          'param_name' => $this->vc_ColumnSlides,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
          'description' => __('Enable if you want to show each column in this row as slides.', $this->tag),
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'checkbox',
          'class' => '',
          'heading' => __('No Scrollbars', $this->tag),
          'param_name' => $this->vc_NoScrollbar,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
          'description' => __('Enable if scrolloverflow is enabled but you don\'t want to show scrollbars for this section.', $this->tag),
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __('Section Main Color', $this->tag),
          'param_name' => $this->vc_SectionMainColor,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
          'param_holder_class' => 'mcw_fp_vc_colorpicker',
          'description' => __('Change main navigation color for this section. Leave empty to use default values.', $this->tag),
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __('Section Hover Color', $this->tag),
          'param_name' => $this->vc_SectionHoverColor,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
          'param_holder_class' => 'mcw_fp_vc_colorpicker',
          'description' => __('Change hover navigation color for this section. Leave empty to use default values.', $this->tag),
        ) );

        vc_add_param( 'vc_row', array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __('Section Active Color', $this->tag),
          'param_name' => $this->vc_SectionActiveColor,
          'dependency' => array('element' => $this->vc_SectionBehaviour, 'value' => array('off', 'on', 'responsive')),
          'value' => '',
          'group' => $this->vcGroupName,
          'param_holder_class' => 'mcw_fp_vc_colorpicker',
          'description' => __('Change active navigation color for this section. Leave empty to use default values.', $this->tag),
        ) );
      }
    }

    public function on_admin_head()
    {
      // TODO: add if the page is edit screen. Add also the same code to metabox.php
      echo '<style>.mcw_fp_vc_colorpicker .vc_alpha-container{display: none;}</style>';
    }
  }
}

// Create MCW Full Page class
if(class_exists('MCW_FullPage'))
{
  $MCW_FullPage = new MCW_FullPage;
}
?>