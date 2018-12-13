<?php
$user = wp_get_current_user();
$role = $user->roles[0];

// Load and show settings page if user is admin
if($role == 'administrator') {
    include_once('templates/tau-settings.php');
}

// Load settings and run necessary actions
$options = get_option('tau_settings');

// Remove/replace WP Icon in upper left corner
if($options['tau_checkbox_show_wp_icon']) {
    add_action('admin_bar_menu', 'tau_replace_wp_menu', 11);
}

// Insert dashboard widget
if(!empty($options['tau_text_field_widget_title']) && !empty($options['tau_textarea_field_widget_html'])) {
    add_action('wp_dashboard_setup', 'tau_dashboard_widgets');
}

// Remove entries from menu if user is not admin
$menu_entries = [];
if($role !== 'administrator') {
    if($options['tau_checkbox_field_2']) {
        $menu_entries[] = 'options-general.php';
    }
    if($options['tau_checkbox_field_3']) {
        $menu_entries[] = 'tools.php';
    }
    if($options['tau_checkbox_field_4']) {
        $menu_entries[] = 'edit-comments.php';
    }
    if($options['tau_checkbox_field_profile']) {
        $menu_entries[] = 'profile.php';
    }
    if($options['tau_checkbox_field_feedback']) {
        $menu_entries[] = 'edit.php?post_type=feedback';
    }
    if($options['tau_checkbox_field_jetpack']) {
        $menu_entries[] = 'jetpack';
    }
    add_action('admin_menu', function() use ($menu_entries) {
        foreach($menu_entries as $tau_menu_slug) {
            remove_menu_page($tau_menu_slug);
        }
    }, 999);
}

if($options['tau_checkbox_field_widget_remove_defaults']) {
    add_action('wp_dashboard_setup', 'tau_remove_default_widgets');
}


function tau_replace_wp_menu($wp_admin_bar) {
    $wp_admin_bar->remove_menu('wp-logo');
    $options = get_option('tau_settings');
    if(!empty($options['tau_text_field_0']) || !empty($options['tau_text_field_logo_url'])) {
        $li_title = empty($options['tau_text_field_logo_url']) ? '' : '<img src="'.$options['tau_text_field_logo_url'].'" style="height:20px;margin-top:6px;">';
        $li_title .= empty($options['tau_text_field_0']) ? '' : $options['tau_text_field_0'];
        $wp_admin_bar->add_menu([
            'id'         => 'tau-custom-branding',
            'title'      => $li_title,
            'meta'         => array(
                'title' => __( '' ),
            ),
        ]);
        if(!empty($options['tau_text_field_1'])) {
            $wp_admin_bar->add_menu([
                'parent' => 'tau-custom-branding',
                'id'     => 'tau-custom-branding-support',
                'title'  => $options['tau_text_field_1'],
                'href'  => 'mailto:'.$options['tau_text_field_1'].'',
            ]);
        }
        if(!empty($options['tau_text_field_website'])) {
            $wp_admin_bar->add_menu([
                'parent' => 'tau-custom-branding',
                'id'     => 'tau-custom-branding-website',
                'title'  => $options['tau_text_field_website'],
                'href'  => $options['tau_text_field_website'],
            ]);
        }
    }
}


function tau_dashboard_widgets() {
    global $wp_meta_boxes;
    $options = get_option('tau_settings');
    wp_add_dashboard_widget('custom_help_widget', $options['tau_text_field_widget_title'], 'tau_custom_widget');
    
}
function tau_custom_widget() {
    $options = get_option('tau_settings');
    echo $options['tau_textarea_field_widget_html'];
}


function tau_remove_default_widgets() {
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // Events/News
    remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Welcome Panel
}
