<?php
/**
 * Full Page Empty Page Template Library
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

if (!class_exists('MCW_FullPage_Template_Lib'))
{
  // Include meta box
  require_once dirname( __FILE__ ) . '/../mcw_metabox/mcw_metabox.php';

  // MCW_FullPage_Template_Lib Class
  class MCW_FullPage_Template_Lib
  {
    protected static $meta_box_id = 'mcw_fp_settings';
    protected static $id_RemoveJS = 'mcw_fp_removejs';

    public static function removeJS($output)
    {
      // Remove JS
      $mcw_fp_removejs = MCW_MetaBox::get_field_value(self::$meta_box_id, self::$id_RemoveJS);
      if ( isset($mcw_fp_removejs) )
      {
        $mcw_fp_removejs = array_filter( explode( ',', $mcw_fp_removejs ) );
        if ( is_array($mcw_fp_removejs) && !empty($mcw_fp_removejs) )
        {
          foreach ($mcw_fp_removejs as $mcw_fp_remove)
          {
            if (!isset($mcw_fp_remove))
              continue;
            $mcw_fp_remove = trim($mcw_fp_remove);
            if (!empty($mcw_fp_remove))
            {
              $remove = str_replace(".", "\.", $mcw_fp_remove);
              $remove = str_replace("/", "\/", $remove);
              $output = preg_replace("/(<\s*script[^>].*?src\s*\=[^>]*".$remove."[^>]*>\s*<\/\s*script\s*>?)/i", '', $output);
            }
          }
        }
      }

      return $output;
    }
  }
}

?>