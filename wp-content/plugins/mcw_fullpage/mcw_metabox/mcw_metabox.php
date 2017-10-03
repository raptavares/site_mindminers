<?php

/* Copyright 2015 Mehmet Celik */

if (! class_exists('MCW_MetaBox'))
{
  class MCW_MetaBox
  {
    // Meta box ID
    protected $id;
    // Meta box title
    protected $title;
    // Fields and sections inside meta box
    protected $groups;
    // Meta box enabled post, page or custom post array
    protected $posts;

    // Is there any checkbox included in the meta box
    private $isCheckboxIncluded = false;
    private $isAccordionIncluded = false;
    // HTML ID counter
    private $idCounter = 0;
    // is Dependency defined
    private $dependencies = array();

    // Settings as array
    static protected $_settings = array();

    // Class constructor
    public function __construct($id, $title, $groups, $posts)
    {
      // Initialize variables
      $this->id = $id;
      $this->title = $title;
      $this->groups = $groups;
      $this->posts = $posts;

      // Convert page parameter to array
      if( ! is_array( $this->posts ) )
        $this->posts = array( $this->posts );

      // Convert groups to array
      if ( isset($this->groups) && ! is_array($this->groups) )
        $this->groups = array( $this->groups );

      // Add admin scripts
      add_action( 'admin_enqueue_scripts', array( $this, 'on_admin_enqueue_scripts' ) );
      // Add admin footer script
      add_action( 'admin_footer', array( $this, 'on_admin_footer' ) );
      // Add meta boxes
      add_action( 'add_meta_boxes', array( $this, 'on_add_meta_boxes' ) );
      // Save meta box action
      add_action( 'save_post',  array( $this, 'on_save_post' ));
    }

    // Get meta box settings array
    protected static function get_settings($meta_id)
    {
      $postID = get_the_ID();

      // If meta value is not loaded before, load it
      if (!isset(self::$_settings[$meta_id]) && $postID)
      {
        self::$_settings[$meta_id] = get_post_meta($postID, $meta_id, true);
      }

      return self::$_settings[$meta_id];
    }

    // Get meta box value
    public static function get_field_value($meta_id, $field_id)
    {
      $settings = MCW_MetaBox::get_settings($meta_id);

      // Check if settings if written before
      if ( empty($settings) || !is_array($settings) )
        return null;

      // Get value
      if (isset($settings[$field_id]))
      {
        $field = $settings[$field_id];

        if (is_array($field))
        {
          return stripslashes_deep($field);
        }
        else
        {
          return stripslashes( wp_kses_decode_entities(trim($field)) );
        }
      }

      return null;
    }

    // Creates a unique html id
    private function get_unique_id()
    {
      // Increment ID counter
      $this->idCounter++;
      // Generate ID
      return ($this->id.'_'. sprintf("%05d", $this->idCounter));
    }

    // Add specified id to dependency array
    private function add_dependency($dependencies, $id)
    {
      if ( (!isset($dependencies)) || (!isset($id)))
        return;

      if (!is_array($dependencies) || empty($dependencies))
        return;

      foreach ($dependencies as $dependency)
      {
        if (!isset($dependency['controller']))
          continue;

        $controller = $dependency['controller'];
        $condition = isset($dependency['condition']) ? $dependency['condition'] : '==';
        $value = isset($dependency['value']) ? $dependency['value'] : true;

        if (!isset($this->dependencies[$controller]))
          $this->dependencies[$controller] = array();

        if (!isset($this->dependencies[$controller][$condition]))
          $this->dependencies[$controller][$condition] = array();

        if (!isset($this->dependencies[$controller][$condition][$value]))
          $this->dependencies[$controller][$condition][$value] = array();

        $this->dependencies[$controller][$condition][$value][] = $id;
      }
    }

    // Meta box admin header scripts and styles
    public function on_admin_enqueue_scripts($hook)
    {
      if ( ($hook == "post.php" || $hook == "post-new.php") && in_array( get_post_type(), $this->posts ) )
      {
        // Meta box related css
        wp_enqueue_style( 'mcw_mb_css', plugins_url('mcw_metabox.css', __FILE__) );

        // JQuery LC Switch for checkboxes
        wp_enqueue_script( 'mcw_mb_cbswitch_js', plugins_url('lc_switch/lc_switch.min.js', __FILE__), array('jquery'));
        wp_enqueue_style( 'mcw_mb_cbswitch_css', plugins_url('lc_switch/lc_switch.css', __FILE__) );

        // jQuery Interdependencies library
        wp_enqueue_script( 'mcw_mb_deps_js', plugins_url('deps/deps.js', __FILE__), array('jquery'));
      }
    }

    // Admin footer javascript
    public function on_admin_footer()
    {
      $deps = (count($this->dependencies)) ? true : false;

      echo '<script type="text/javascript">(function($){$(document).ready(function(){';

      if ($deps)
      {
        echo "var ruleSet = $.deps.createRuleset(); var rule;";
      }

      foreach($this->dependencies as $controller => $conditions)
      {
        foreach ($conditions as $condition => $values)
        {
          foreach ($values as $value => $ids)
          {
            echo "rule = ruleSet.createRule('#$this->id #$controller', '$condition', '$value');";

            foreach ($ids as  $id)
            {
              echo "rule.include('#$this->id #$id');";
            }
          }
        }
      }

      if ($deps)
      {
        echo "ruleSet.install({'show': function(control){\$(control).fadeIn();}, 'hide': function(control){\$(control).fadeOut();}});";
      }

      // Add accordion JS
      if ($this->isCheckboxIncluded)
      {
        echo "$('#$this->id .mcw_row').each(function(){
          $(this).find('input:checkbox').lc_switch();
          $(this).delegate('input:checkbox', 'lcs-statuschange', function(){
            $(this).trigger('change.deps');
          });
        });";
      }

      // Add accordion JS
      if ($this->isAccordionIncluded)
      {
        echo "$('#$this->id .js_accordionTrigger').each(function(){
          $(this).on('click', function(e){
            if (e.preventDefault) e.preventDefault(); else e.returnValue = false;
            $(this).toggleClass('is-expanded');
            $(this).next().toggleClass('is-collapsed');
          });
        });";
      }

      echo '});})(jQuery);</script>';
    }

    // Add meta box to specified post types
    // Called from add_meta_boxes action
    public function on_add_meta_boxes()
    {
      // Check if groups is defined
      if (!isset($this->groups))
        return $postID;

      // Check if groups is array
      if (!is_array($this->groups))
        return $postID;

      // Add meta box for each post type
      foreach ( $this->posts as $page )
      {
        add_meta_box( $this->id, $this->title, array( $this, 'meta_box_html' ), $page, 'normal', 'high', null );
      }
    }

    // Meta box field output html
    private function meta_box_field_html($field)
    {
      $html = '';

      // Check if field is an array
      if (!is_array($field))
        return $html;

      // Check if field ID is set
      if (!isset($field['id']))
        return $html;

      // Get post meta value
      $value = MCW_MetaBox::get_field_value($this->id, $field['id']);

      // Check if meta field is set
      if (!isset($value))
      {
        // Meta field value is not set, so reset string and get from field value if there is
        $value = (isset($field['value'])) ? $field['value'] : '';
      }

      // Generate ID
      $id = $this->get_unique_id();
      // Get dependency
      if (isset($field['dependency']))
      {
        $this->add_dependency($field['dependency'], $id);
      }

      $level = '';
      if (isset($field['level']) && !empty($field['level']))
      {
        $level = ' mcw_row_level'.$field['level'];
      }

      // Set row output
      $html .= '<div class="mcw_row'.$level.'" id="'.$id.'">
        <div class="mcw_row_content">';

      // Content class
      $content_class = '';
      if (isset($field['class']))
      {
        $content_class = ' '.$field['class'];
      }

      if (isset($field['label']))
      {
          $html .= '<div class="mcw_col_label">
            <label for="'.$field['id'].'">'.$field['label'].'</label>
          </div><div class="mcw_col_content'.$content_class.'">';
      }
      else
      {
        $html .= '<div class="mcw_col_content'.$content_class.'" style="width: 100%;">';
      }

      // Add checkbox
      if ($field['type'] == 'checkbox')
      {
        // Set checkbox included
        $this->isCheckboxIncluded = true;
        // Checkbox HTML
        $html .= '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" value="on"'.(($value =='on') ? 'checked' :'').'>';
      }
      else if ($field['type'] == 'textbox')
      {
        if (empty($value))
          $value = (isset($field['value'])) ? $field['value'] : '';

        // Text box html
        $html .= '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$value.'" style="width:100%;">';
      }
      else if ($field['type'] == 'textarea')
      {
        if (empty($value))
          $value = (isset($field['value'])) ? $field['value'] : '';
        // Text box html
        $rows = isset($field['rows']) ? $field['rows'] : 4;
        $maxlength = isset($field['maxlength']) ? (' maxlength="'.$field['maxlength'].'" ') : '';
        $html .= '<textarea name="'.$field['id'].'" id="'.$field['id'].'"rows="'.$rows.'"'.$maxlength.'style="width:100%;">'.$value.'</textarea>';
      }
      else if ($field['type'] == 'selectbox')
      {
        if (empty($value))
          $value = (isset($field['value'])) ? $field['value'] : '';

        // Select box html
        $html .= '<select name="'.$field['id'].'" id="'.$field['id'].'">';
        if (isset($field['options']))
        {
          foreach ($field['options'] as $optid => $optname)
          {
            $html .= '<option value="'.$optid.'"'.(($value == $optid) ? ' selected' :'').'>'.$optname.'</option>';
          }
        }
        $html .= '</select>';
      }
      else if ($field['type'] == 'raw')
      {
        $html .= $field['value'];
      }

      // mcw_col_content and mcw_row div close
      $html .= '</div></div>';

      // Add description
      if (isset($field['description']))
      {
        $html .= '<div class="mcw_row_desc"><p>'.$field['description'].'</p></div>';
      }

      // mcw_row div close
      $html .= '</div>';

      return $html;
    }

    // Meta Box output html
    // Called from add_meta_box handler
    public function meta_box_html()
    {
      // Add nonce
      wp_nonce_field( '_mcw_mb_nonce_field', 'mcw_mb_nonce_field' );

      // Begin table div
      echo '<div class="form-table">';

      // Generate HTML code for groups
      foreach ($this->groups as $group)
      {
        // Check if group type is specified, otherwise set as section
        if ( ! isset($group['type']) )
        {
          $group['type'] = 'section';
        }

        if ($group['type'] == 'section')
        {
          // Generate ID
          $id = $this->get_unique_id();
          // Get dependency
          if (isset($group['dependency']))
          {
            $this->add_dependency($group['dependency'], $id);
          }

          // Start section div
          echo '<div class="mcw_fp_section" id="'.$id.'">';

          if (isset($group['fields']))
          {
            foreach ($group['fields'] as $field)
            {
              // Echo output of div
              echo $this->meta_box_field_html($field);
            }
          }

          // Close section div
          echo '</div>';
        }
        else if ($group['type'] == 'accordion')
        {
          // Set accordion included
          $this->isAccordionIncluded = true;

          // Generate ID
          $id = $this->get_unique_id();
          // Get dependency
          if (isset($group['dependency']))
          {
            $this->add_dependency($group['dependency'], $id);
          }

          // Start accordion div
          echo '<div class="mcw_accordion" id="'.$id.'">';

          // Set title
          echo '<div class="accordionTitle js_accordionTrigger">'.$group['title'].'</div>';

          // Set content
          echo '<div class="accordionItem is-collapsed">';

          if (isset($group['fields']))
          {
            foreach ($group['fields'] as $field)
            {
              // Echo output of div
              echo $this->meta_box_field_html($field);
            }
          }

          echo '</div>';

          // Close accordion div
          echo '</div>';
        }
      }

      // End table div
      echo '</div>';
    }

    // Meta Box save parameters
    // Called from save_post action
    public function on_save_post($postID)
    {
      // Check autosave
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $postID;

      // Verify nonce
      if ( (!isset($_POST['mcw_mb_nonce_field'])) || (!wp_verify_nonce($_POST['mcw_mb_nonce_field'], '_mcw_mb_nonce_field')) )
        return $postID;

      // check permissions
      if ( ! current_user_can( 'edit_post', $postID ) )
        return $postID;

      // Check if current page is in specified post array
      if ( ! in_array( get_post_type(), $this->posts ) )
        return $postID;

      // Check if groups is defined
      if (!isset($this->groups))
        return $postID;

      // Check if groups is array
      if (!is_array($this->groups))
        return $postID;

      // Initialize settings
      $settings = array();

      foreach ($this->groups as $group)
      {
        if (isset($group['fields']))
        {
          foreach ($group['fields'] as $field)
          {
            // Initialize field value
            $settings[$field['id']] = '';
            if ( isset($_POST[$field['id']]) )
            {
              // Set field value
              $settings[$field['id']] = $_POST[$field['id']];
            }
          }
        }
      }

      // Save meta box
      if ( is_array( $settings ) && ! empty( $settings ) )
      {
        update_post_meta( $postID, $this->id, $settings );
      }
      else
      {
        delete_post_meta( $postID, $this->id );
      }
    }
  }
}