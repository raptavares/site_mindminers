<?php
/**
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */

add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_submenu_type_fields', 10, 4 );

function whole_add_menu_submenu_type_fields( $item_id, $item, $depth, $args ) {

    if ( $depth )
        return;

    $title = esc_html__('Submenu Type', 'whole'); $key = "menu-item-submenu_type"; $value = $item->submenu_type;

    ?><p class="description description-wide description_width_100">
        <?php echo esc_html( $title ); ?><br />
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <option value="standard" <?php echo ( $value == 'standard' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Standard Dropdown', 'whole' ); ?></option>
                <option value="columns2" <?php echo ( $value == 'columns2' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( '2 columns dropdown', 'whole' ); ?></option>
                <option value="columns3" <?php echo ( $value == 'columns3' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( '3 columns dropdown', 'whole' ); ?>
                </option>
                <option value="columns4" <?php echo ( $value == 'columns4' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( '4 columns dropdown', 'whole' ); ?></option>
                <option value="columns5" <?php echo ( $value == 'columns5' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( '5 columns dropdown', 'whole' ); ?></option>
            </select>
        </label>
    </p>
    <?php
    $title = esc_html__('Sub menu column width ( Example: 200)', 'whole');
    $key = "menu-item-column_width";
    $value = $item->column_width;
    ?>
    <p class="description description-wide obtheme_checkbox obtheme_mega_menu obtheme_mega_menu_d2">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
        </label>
    </p>
    <?php
    $title = esc_html__('Side of Dropdown Elements', 'whole');
    $key = "menu-item-dropdown";
    $value = $item->dropdown;
    ?>
    <p class="description description-wide description_width_100">
        <?php echo esc_html( $title ); ?><br />
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <option value="autodrop_submenu" <?php echo ( $value == 'autodrop_submenu' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Auto drop', 'whole' ); ?></option>
                <option value="drop_to_left" <?php echo ( $value == 'drop_to_left' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Drop To Left Side', 'whole' ); ?></option>
                <option value="drop_to_right" <?php echo ( $value == 'drop_to_right' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Drop To Right Side', 'whole' ); ?></option>
                <option value="drop_to_center" <?php echo ( $value == 'drop_to_center' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Drop To Center', 'whole' ); ?></option>
                <option value="drop_full_width" <?php echo ( $value == 'drop_full_width' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Full width', 'whole' ); ?></option>
            </select>
        </label>
    </p><?php
}

// widget_area.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_widget_area_fields', 10, 4 );

function whole_add_menu_widget_area_fields( $item_id, $item, $depth, $args ) {

    if(!$depth)
        return;

    $title = esc_html__('Widget Area', 'whole'); $key = "menu-item-widget_area"; $value = $item->widget_area; $sidebars = $GLOBALS['wp_registered_sidebars'];

    ?><p class="description description-wide description_width_100 el_widget_area">
        <?php echo esc_html( $title ); ?><br />
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <option value="" <?php echo ( $value == '' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Select Widget Area', 'whole' ); ?></option>
                <?php foreach ( $sidebars as $sidebar ) {
                    echo '<option value="' . $sidebar['id'] . '" ' . ( ( $value == $sidebar['id'] ) ? ' selected="selected" ' : '' ) . '>[' . $sidebar['id'] . '] - ' . $sidebar['name'] . '</option>';
                } ?>
            </select>
        </label>
    </p><?php
}

// item_group.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_item_group_fields', 10, 4 );

function whole_add_menu_item_group_fields( $item_id, $item, $depth, $args ) {

    $title = esc_html__('Group', 'whole');$key = "menu-item-group"; $value = $item->group;

    ?>
    <p class="description description-wide description_width_100">
        <?php echo esc_html( $title ); ?><br />
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <option value="no_group" <?php echo ( $value == 'no_group' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'No', 'whole' ); ?></option>
                <option value="group" <?php echo ( $value == 'group' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Yes', 'whole' ); ?></option>
            </select>
        </label>
    </p>
    <?php
}

// hide_link.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_hide_link_fields', 10, 4 );

function whole_add_menu_hide_link_fields( $item_id, $item, $depth, $args ) {
    if(!$depth)
        return;

    $title = esc_html__('Hide title', 'whole'); $key = "menu-item-hide_link"; $value = $item->hide_link;

    ?>
    <p class="description description-wide description_width_100">
        <?php echo esc_html( $title ); ?><br />
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <option value="0" <?php echo ( $value == '0' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'No', 'whole' ); ?></option>
                <option value="1" <?php echo ( $value == '1' ) ? ' selected="selected" ' : ''; ?>><?php esc_html_e( 'Yes', 'whole' ); ?></option>
            </select>
        </label>
    </p>
    <?php
}


// menu icon.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_icon_fields', 10, 4 );

function whole_add_menu_icon_fields( $item_id, $item, $depth, $args ) {

    $title = esc_html__('Menu Icon', 'whole'); $key = "menu-item-menu_icon"; $value = $item->menu_icon;

    ?>
    <div id="<?php echo ''.$key . '-' . $item_id . '-popup'; ?>" data-item_id="<?php echo ''.$item_id;?>" class="menu_icon_wrap" style="display:none;">
        <?php
        $icons = apply_filters('theme/menu/icons', whole_font_awesome());
        $html = '<input type="hidden" name="" class="wpb_vc_param_value" value="' . $value . '" id="trace"/> ';
        $html .= '<div class="icon-preview icon-preview-' . $item_id . '"><i class="' . $value . '"></i></div>';
        $html .= '<div id="' . $key . '-' . $item_id . '-icon-dropdown" >';
        $html .= '<ul class="icon-list">';
        $n = 1;
        foreach ( $icons as $icon ) {
            $selected = ( $icon == $value ) ? 'class="selected"' : '';
            $id       = 'icon-' . $n;
            $html .= '<li ' . $selected . ' data-icon="' . $icon . '"><i class="icon ' . $icon . '"></i></li>';
            $n ++;
        }
        $html .= '</ul>';
        $html .= '</div>';
        echo ''.$html;
        ?>
    </div>
    <p class="description description-wide obtheme_checkbox obtheme_mega_menu obtheme_mega_menu_d1">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <?php echo esc_html( $title ); ?><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
            <input alt="#TB_inline?height=auto&width=auto&inlineId=<?php echo ''.$key . '-' . $item_id . '-popup'; ?>" title="<?php esc_html_e( 'Click to browse icon', 'whole' ) ?>" class="thickbox button-secondary submit-add-to-menu" type="button" value="<?php esc_html_e( 'Browse Icon', 'whole' ) ?>" />
            <a class="button btn_clear button-primary" href="javascript: void(0);">Clear</a>
            <span class="icon-preview  icon-preview<?php echo '-' . $item_id; ?>"><i class=" fa fa-<?php echo ''.$value; ?>"></i></span>
        </label>
    </p>
    <?php
}

// menu background.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_image_background_fields', 10, 4 );

function whole_add_menu_image_background_fields( $item_id, $item, $depth, $args ) {

    if($depth)
        return;

    $title = esc_html__('DropDown Background Image', 'whole'); $key = "menu-item-bg_image"; $value = $item->bg_image;

    ?>
    <p class="description description-wide obtheme_checkbox obtheme_mega_menu obtheme_mega_menu_d2">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
            <button id="browse-edit-<?php echo ''.$key . '-' . $item_id; ?>" class="set_custom_images button button-secondary submit-add-to-menu"><?php esc_html_e( 'Browse Image', 'whole' ); ?></button>
            <a class="button btn_clear button-primary" href="javascript: void(0);">Clear</a>
        </label>
    </p>
    <p class="description description-wide description_width_25">

        <?php $key = "menu-item-bg_image_repeat"; $value = $item->bg_image_repeat; $options = array( 'repeat', 'no-repeat', 'repeat-x', 'repeat-y' ); ?>

        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <?php foreach ( $options as $option ) {
                    ?>
                    <option value="<?php echo ''.$option; ?>" <?php echo ( $value == $option ) ? ' selected="selected" ' : ''; ?>><?php echo ''.$option; ?></option>
                    <?php
                } ?>
            </select>
        </label>

        <?php $key = "menu-item-bg_image_attachment"; $value = $item->bg_image_attachment; $options = array( 'scroll', 'fixed' ); ?>

        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">
                <?php
                foreach ( $options as $option ) {
                    ?>
                    <option value="<?php echo ''.$option; ?>" <?php echo ( $value == $option ) ? ' selected="selected" ' : ''; ?>><?php echo ''.$option; ?></option>
                    <?php
                }
                ?>
            </select>
        </label>

        <?php $key = "menu-item-bg_image_position"; $value = $item->bg_image_position; $options = array( 'center', 'center left', 'center right', 'top left', 'top center', 'top right', 'bottom left', 'bottom center', 'bottom right' ); ?>

        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">

                <?php foreach ( $options as $option ) {
                    ?><option value="<?php echo ''.$option; ?>" <?php echo ( $value == $option ) ? ' selected="selected" ' : ''; ?>><?php echo ''.$option; ?></option><?php
                } ?>

            </select>
        </label>

        <?php $key = "menu-item-bg_image_size"; $value = $item->bg_image_size; $options = array( "auto" => "Keep original", "100% auto" => "Stretch to width", "auto 100%" => "Stretch to height", "cover" => "cover", "contain" => "contain" ); ?>

        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <select id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>">

                <?php foreach ( $options as $op_value => $op_text ) {
                    ?><option value="<?php echo ''.$op_value; ?>" <?php echo ( $value == $op_value ) ? ' selected="selected" ' : ''; ?>><?php echo ''.$op_text; ?></option><?php
                } ?>

            </select>
        </label>
    </p>

    <?php $title = esc_html__('Background Color', 'whole'); $key = "menu-item-bg_color"; $value = $item->bg_color; ?>

    <p class="description description-wide">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
        </label>
    </p>

    <?php $title = esc_html__('Icon Color', 'whole'); $key = "menu-item-icon_color"; $value = $item->icon_color; ?>

    <p class="description description-wide">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
        </label>
    </p>

    <?php $title = esc_html__('Icon Font Size', 'whole'); $key = "menu-item-icon_font_size"; $value = $item->icon_font_size; ?>

    <p class="description description-wide">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
        </label>
    </p><?php
}

// menu background.
add_action( 'wp_nav_menu_item_custom_fields', 'whole_add_menu_el_class_fields', 10, 4 );

function whole_add_menu_el_class_fields( $item_id, $item, $depth, $args ) {

    $title = esc_html__('Extra Class', 'whole'); $key = "menu-item-el_class"; $value = $item->el_class;

    ?><p class="description description-wide description_width_100">
        <label for="edit-<?php echo ''.$key . '-' . $item_id; ?>">
            <span class='obtheme_long_desc'><?php echo esc_html( $title ); ?></span><br />
            <input type="text" value="<?php echo ''.$value; ?>" id="edit-<?php echo ''.$key . '-' . $item_id; ?>" class=" <?php echo ''.$key; ?>" name="<?php echo ''.$key . "[" . $item_id . "]"; ?>" />
        </label>
    </p><?php
}


class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
    /**
     * @see Walker_Nav_Menu::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * @see Walker_Nav_Menu::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {}

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth, $wp_registered_sidebars;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        ob_start();
        $item_id = esc_attr( $item->ID );
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ( 'taxonomy' == $item->type ) {
            $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
            if ( is_wp_error( $original_title ) )
                $original_title = false;
        } elseif ( 'post_type' == $item->type ) {
            $original_object = get_post( $item->object_id );
            $original_title = get_the_title( $original_object->ID );
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr( $item->object ),
            'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if ( ! empty( $item->_invalid ) ) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf( esc_html__( '%s (Invalid)', 'whole'), $item->title );
        } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf( esc_html__('%s (Pending)', 'whole'), $item->title );
        }

        $title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

        $submenu_text = '';
        if ( 0 == $depth )
            $submenu_text = 'style="display: none;"';

        ?>
    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
        <dl class="menu-item-bar">
            <dt class="menu-item-handle">
                <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'sub item' , 'whole'); ?></span></span>
                <span class="item-controls">
                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                        echo esc_url( wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'move-up-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                            ),
                            'move-menu_item'
                        ) );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'whole'); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                        echo esc_url( wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'move-down-menu-item',
                                    'menu-item' => $item_id,
                                ),
                                remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                            ),
                            'move-menu_item'
                        ) );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'whole'); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'whole'); ?>" href="<?php
                    echo esc_url( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ) );
                    ?>"><?php esc_html_e( 'Edit Menu Item', 'whole' ); ?></a>
                </span>
            </dt>
        </dl>

        <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
            <?php if( 'custom' == $item->type ) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                        <?php esc_html_e( 'URL', 'whole' ); ?><br />
                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                    </label>
                </p>
            <?php endif; ?>
            <p class="description description-thin">
                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                    <?php esc_html_e( 'Navigation Label', 'whole' ); ?><br />
                    <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                </label>
            </p>
            <p class="description description-thin">
                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                    <?php esc_html_e( 'Title Attribute', 'whole' ); ?><br />
                    <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                </label>
            </p>
            <p class="field-link-target description">
                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                    <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                    <?php esc_html_e( 'Open link in a new window/tab', 'whole' ); ?>
                </label>
            </p>
            <p class="field-css-classes description description-thin">
                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                    <?php esc_html_e( 'CSS Classes (optional)', 'whole' ); ?><br />
                    <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                </label>
            </p>
            <p class="field-xfn description description-thin">
                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                    <?php esc_html_e( 'Link Relationship (XFN)', 'whole' ); ?><br />
                    <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                </label>
            </p>
            <p class="field-description description description-wide">
                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                    <?php esc_html_e( 'Description', 'whole' ); ?><br />
                    <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
                    <span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'whole' ); ?></span>
                </label>
            </p>

            <?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args ); ?>

            <p class="field-move hide-if-no-js description description-wide">
                <label>
                    <span><?php esc_html_e( 'Move', 'whole' ); ?></span>
                    <a href="#" class="menus-move menus-move-up" data-dir="up"><?php esc_html_e( 'Up one', 'whole' ); ?></a>
                    <a href="#" class="menus-move menus-move-down" data-dir="down"><?php esc_html_e( 'Down one', 'whole' ); ?></a>
                    <a href="#" class="menus-move menus-move-left" data-dir="left"></a>
                    <a href="#" class="menus-move menus-move-right" data-dir="right"></a>
                    <a href="#" class="menus-move menus-move-top" data-dir="top"><?php esc_html_e( 'To the top', 'whole' ); ?></a>
                </label>
            </p>

            <div class="menu-item-actions description-wide submitbox">
                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                    <p class="link-to-original">
                        <?php printf( esc_html__('Original: %s', 'whole' ), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                    </p>
                <?php endif; ?>
                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                echo esc_url( wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'delete-menu-item',
                            'menu-item' => $item_id,
                        ),
                        admin_url( 'nav-menus.php' )
                    ),
                    'delete-menu_item_' . $item_id
                ) ); ?>"><?php esc_html_e( 'Remove', 'whole' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
                ?>#menu-item-settings-<?php echo $item_id; ?>"><?php esc_html_e('Cancel', 'whole' ); ?></a>
            </div>

            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
        </div><!-- .menu-item-settings-->
        <ul class="menu-item-transport"></ul>
        <?php
        $output .= ob_get_clean();
    }
}

class HeroMenuWalker extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }
        $id_field = $this->db_fields['id'];
        //display this element
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
        }
        $cb_args = array_merge( array( &$output, $element, $depth ), $args );
        call_user_func_array( array( $this, 'start_el' ), $cb_args );

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if ( ( $max_depth == 0 || $max_depth > $depth + 1 ) && isset( $children_elements[$id] ) ) {
            $b          = $args[0];
            $b->element = $element;
            $b->count_child = count($children_elements[$id]);
            //$b->mega_child = $element->mega;
            $args[0]    = $b;
            foreach ( $children_elements[$id] as $child ) {
                if ( ! isset( $newlevel ) ) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge( array( &$output, $depth ), $args );
                    $cb_args = array_merge( array( &$output, $depth ), $args );
                    call_user_func_array( array( $this, 'start_lvl' ), $cb_args );
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            unset( $children_elements[$id] );
        }

        if ( isset( $newlevel ) && $newlevel ) {
            //end the child delimiter
            $cb_args = array_merge( array( &$output, $depth ), $args );
            call_user_func_array( array( $this, 'end_lvl' ), $cb_args );
        }

        //end this element
        $cb_args = array_merge( array( &$output, $element, $depth ), $args );
        call_user_func_array( array( $this, 'end_el' ), $cb_args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() )  {
        $bg_image        = isset($args->element->bg_image)?$args->element->bg_image:'';
        $column_width        = isset($args->element->column_width)?(!empty($args->element->column_width)?$args->element->column_width:200):200;
        $bg_color        = isset($args->element->bg_color)?$args->element->bg_color:'';
        $icon_color        = isset($args->element->icon_color)?$args->element->icon_color:'';
        $pos_left        = isset($args->element->pos_left)?$args->element->pos_left:'';
        $pos_right        = isset($args->element->pos_right)?$args->element->pos_right:'';
        $submenu_type        = isset($args->element->submenu_type)?$args->element->submenu_type:'standard';
        $dropdown        = isset($args->element->dropdown)?$args->element->dropdown:'drop_to_left';
        $class = null;
        $style = 'style="';
        $columns = array('columns2'=>2,'columns3'=>3,'columns4'=>4,'columns5'=>5);
        if($submenu_type != 'standard' && $depth == 0){
            if(isset($columns[$submenu_type])){
                $style = 'style="width:'.($column_width*$columns[$submenu_type]).'px;';
                $class = 'multicolumn mega-columns-'.$columns[$submenu_type];
            }
            $class = 'multicolumn';
        }else if($depth == 0){
            $style = 'style="width:'.($column_width).'px;';
            $class = 'standar-dropdown';
        }
        $class .= ' '.$submenu_type;
        $class .= ' '.$dropdown;
        $class = $bg_image?$class .= ' sub-menu mega-bg-image':$class .= ' sub-menu';
        if ( $bg_image ) {
            $bg_image_repeat     = $args->element->bg_image_repeat;
            $bg_image_attachment = $args->element->bg_image_attachment;
            $bg_image_position   = $args->element->bg_image_position;
            $bg_image_size       = $args->element->bg_image_size;
            $style               .= 'background-image:url(' . $bg_image . ');background-repeat:' . $bg_image_repeat . ';background-attachment:' . $bg_image_attachment . ';background-position:' . $bg_image_position . ';background-size:' . $bg_image_size . ';';
        }
        if ( $bg_color ) {
            $style               .= 'background-color:'.$bg_color.';';
        }
        if ( $pos_left ) {
            $style               .= 'left:'.$pos_left.';';
        }
        if ( $pos_right ) {
            $style               .= 'right:'.$pos_right.';';
        }
        $style .='"';
        $indent = str_repeat( "\t", $depth );

        $output .= "\n$indent<ul class='$class' $style>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = '';
        $menu_icon = isset($item->menu_icon)?$item->menu_icon:'';
        $icon_color = isset($item->icon_color)?$item->icon_color:'';
        $icon_font_size = isset($item->icon_color)?$item->icon_font_size:'';
        $dropdown = isset($item->dropdown)?$item->dropdown:'';
        $hide_link = isset($item->hide_link)?$item->hide_link:0;
        $group = isset($item->group)?$item->group:'';
        $el_class = isset($item->el_class)?$item->el_class:'';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        if($dropdown == "drop_full_width"){
            $classes[]= 'has_full_width';
        }
        if($hide_link){
            $classes[]= ' hidden-menu-item';
        }
        $classes[]= $group;
        $classes[]= $el_class;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $class_names .' data-depth="'.$depth.'">';
        $atts = array();
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $attr_title  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $item_output = isset($args->before)?$args->before:'';
        $link_before = isset($args->link_before)?$args->link_before:'';
        $link_after = isset($args->link_after)?$args->link_after:'';
        $after = isset($args->after)?$args->after:'';
        
        $item_output .= '<a'. $attributes .'>';
        if ( $menu_icon ) {
            $item_output .= '<i style="color: '.$icon_color.'; font-size: '.$icon_font_size.'" class="' . $menu_icon . '"></i> ';
        }
        $item_output.='<span class="menu-title">';
        $item_output .= $link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $link_after;
        if ( $attr_title ) {
            $item_output .= '<span class="title-attribute">'.$attr_title.'</span> ';
        }
        $item_output .= '</span></a>';
        
        $widget_area = $item->widget_area;
        if ($widget_area && $depth != 0) {
            ob_start();
            dynamic_sidebar($widget_area);
            $content         = ob_get_clean();
            if ( $content ) {
                $item_output .= $content;
            }
        }
        $item_output .= $after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}