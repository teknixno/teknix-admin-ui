<?php
add_action( 'admin_menu', 'tau_add_admin_menu' );
add_action( 'admin_init', 'tau_settings_init' );


function tau_add_admin_menu() { 
    add_options_page( 'Teknix Admin UI', 'Teknix Admin UI', 'manage_options', 'teknix-admin-ui', 'tau_options_page' );
}


function tau_settings_init() { 

    register_setting('pluginPage', 'tau_settings');


    add_settings_section(
        'tau_pluginPage_section_wpmenu', 
        __( '<hr><br>WP Menu Branding', 'wordpress' ), 
        'tau_settings_section_callback_wpmenu', 
        'pluginPage'
    );
    add_settings_field( 
        'tau_checkbox_show_wp_icon', 
        __( 'Remove WordPress logo in upper left corner', 'wordpress' ), 
        'tau_checkbox_show_wp_icon_render', 
        'pluginPage', 
        'tau_pluginPage_section_wpmenu' 
    );
    add_settings_field( 
        'tau_text_field_0', 
        __( 'Company name (only shows if opted to remove WordPress logo)', 'wordpress' ), 
        'tau_text_field_0_render', 
        'pluginPage', 
        'tau_pluginPage_section_wpmenu' 
    );
    add_settings_field( 
        'tau_text_field_logo_url', 
        __( 'Logo URL (will be shown next to Company name if present, only shows if opted to remove WordPress logo)', 'wordpress' ), 
        'tau_text_field_logo_url_render', 
        'pluginPage', 
        'tau_pluginPage_section_wpmenu' 
    );
    add_settings_field( 
        'tau_text_field_1', 
        __( 'Support email address (shows below Company name if opted to remove WordPress logo)', 'wordpress' ), 
        'tau_text_field_1_render', 
        'pluginPage', 
        'tau_pluginPage_section_wpmenu' 
    );
    add_settings_field( 
        'tau_text_field_website', 
        __( 'Website (shows below Company name if opted to remove WordPress logo)', 'wordpress' ), 
        'tau_text_field_website_render', 
        'pluginPage', 
        'tau_pluginPage_section_wpmenu' 
    );


    add_settings_section(
        'tau_pluginPage_section_navigation', 
        __( '<hr><br>Customize Navigation Menu', 'wordpress' ), 
        'tau_settings_section_callback_navigation', 
        'pluginPage'
    );
    add_settings_field( 
        'tau_checkbox_field_2', 
        __( 'Remove Settings from menu', 'wordpress' ), 
        'tau_checkbox_field_2_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );
    add_settings_field( 
        'tau_checkbox_field_3', 
        __( 'Remove Tools from menu', 'wordpress' ), 
        'tau_checkbox_field_3_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );
    add_settings_field( 
        'tau_checkbox_field_4', 
        __( 'Remove Comments from menu', 'wordpress' ), 
        'tau_checkbox_field_4_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );
    add_settings_field( 
        'tau_checkbox_field_profile', 
        __( 'Remove Profile from menu', 'wordpress' ), 
        'tau_checkbox_field_profile_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );
    add_settings_field( 
        'tau_checkbox_field_feedback', 
        __( 'Remove Feedback from menu', 'wordpress' ), 
        'tau_checkbox_field_feedback_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );
    add_settings_field( 
        'tau_checkbox_field_jetpack', 
        __( 'Remove Jetpack plugin from menu', 'wordpress' ), 
        'tau_checkbox_field_jetpack_render', 
        'pluginPage', 
        'tau_pluginPage_section_navigation' 
    );


    add_settings_section(
        'tau_pluginPage_section_widget', 
        __( '<hr><br>Dashboard Widgets', 'wordpress' ), 
        'tau_settings_section_callback_widget', 
        'pluginPage'
    );
    add_settings_field( 
        'tau_checkbox_field_widget_remove_defaults', 
        __( 'Remove default widgets', 'wordpress' ), 
        'tau_checkbox_field_widget_remove_defaults_render', 
        'pluginPage', 
        'tau_pluginPage_section_widget' 
    );
    add_settings_field( 
        'tau_text_field_widget_title', 
        __( 'Title for custom widget', 'wordpress' ), 
        'tau_text_field_widget_title_render', 
        'pluginPage', 
        'tau_pluginPage_section_widget' 
    );
    add_settings_field( 
        'tau_textarea_field_widget_html', 
        __( 'Body for custom widget (supports HTML)', 'wordpress' ), 
        'tau_textarea_field_widget_html_render', 
        'pluginPage', 
        'tau_pluginPage_section_widget' 
    );


}


function tau_checkbox_show_wp_icon_render() {
    $options = get_option('tau_settings');
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_show_wp_icon]' <?php checked( $options['tau_checkbox_show_wp_icon'], 1 ); ?> value='1'>
    <?php
}
function tau_text_field_0_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='text' name='tau_settings[tau_text_field_0]' value='<?php echo $options['tau_text_field_0']; ?>'>
    <?php
}
function tau_text_field_logo_url_render() {
    $options = get_option( 'tau_settings' );
    ?>
    <input type='text' name='tau_settings[tau_text_field_logo_url]' value='<?php echo $options['tau_text_field_logo_url']; ?>'>
    <?php
}
function tau_text_field_1_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='text' name='tau_settings[tau_text_field_1]' value='<?php echo $options['tau_text_field_1']; ?>'>
    <?php
}
function tau_text_field_website_render() {
    $options = get_option( 'tau_settings' );
    ?>
    <input type='text' name='tau_settings[tau_text_field_website]' value='<?php echo $options['tau_text_field_website']; ?>'>
    <?php
}


function tau_checkbox_field_2_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_2]' <?php checked( $options['tau_checkbox_field_2'], 1 ); ?> value='1'>
    <?php
}
function tau_checkbox_field_3_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_3]' <?php checked( $options['tau_checkbox_field_3'], 1 ); ?> value='1'>
    <?php
}
function tau_checkbox_field_4_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_4]' <?php checked( $options['tau_checkbox_field_4'], 1 ); ?> value='1'>
    <?php
}
function tau_checkbox_field_profile_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_profile]' <?php checked( $options['tau_checkbox_field_profile'], 1 ); ?> value='1'>
    <?php
}
function tau_checkbox_field_feedback_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_feedback]' <?php checked( $options['tau_checkbox_field_feedback'], 1 ); ?> value='1'>
    <?php
}
function tau_checkbox_field_jetpack_render() { 
    $options = get_option( 'tau_settings' );
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_jetpack]' <?php checked( $options['tau_checkbox_field_jetpack'], 1 ); ?> value='1'>
    <?php
}


function tau_checkbox_field_widget_remove_defaults_render() {
    $options = get_option('tau_settings');
    ?>
    <input type='checkbox' name='tau_settings[tau_checkbox_field_widget_remove_defaults]' <?php checked( $options['tau_checkbox_field_widget_remove_defaults'], 1 ); ?> value='1'>
    <?php
}
function tau_text_field_widget_title_render() {
    $options = get_option('tau_settings');
    ?>
    <input type='text' name='tau_settings[tau_text_field_widget_title]' value='<?php echo $options['tau_text_field_widget_title']; ?>'>
    <?php
}
function tau_textarea_field_widget_html_render() { 
    $options = get_option('tau_settings');
    ?>
    <textarea cols='40' rows='15' name='tau_settings[tau_textarea_field_widget_html]'><?php echo $options['tau_textarea_field_widget_html']; ?></textarea>
    <?php
}


function tau_settings_section_callback_wpmenu() { 
    echo __('<p class="tau-settings-paragraph">This will only take effect if you choose to remove the WordPress logo. 
    If both Company name and Logo URL are provided, they will be shown next to eachother, but you can skip one of them if desired. 
    Support email address and website will be shown in a dropdown menu while hovering over the logo/text in the upper left corner.</p>', 'wordpress');
}
function tau_settings_section_callback_navigation() {
    echo __('The menu items will be removed from all users except Administrators.', 'wordpress');
}
function tau_settings_section_callback_widget() {
    echo __('The following widgets will be removed for all users (including administrators) if opted for <i>Remove default widgets</i>: 
    <ul class="tau-ul">
        <li>Welcome</li>
        <li>Wordpress Events and News</li>    
    </ul>
    Leave input fields for custom widget empty if you don\'t want to add a dashboard widget.', 'wordpress');
}


function tau_options_page() {

    ?>
    <style>
    .tau-settings table td input[type="text"], .tau-settings table td textarea {
        width:90%;
        max-width:500px;
    }
    p.tau-settings-paragraph {
        width:90%;
        max-width:800px;
    }
    ul.tau-ul {
        list-style:square;
    }
    ul.tau-ul li {
        margin-left:20px;
    }
    .tau-settings-header {
        padding:30px 0px 60px 0px;
        width:calc(100%+10px);
        /* margin: 0px 0px 0px -20px; */
        margin-left:-20px !important;
        background:#36434c;
        text-align:center;
        left:0; right:0;
        margin:0;
    }
    .tau-settings-header h2, .tau-settings-header h3 {
        color:#fff;
    }
    </style>
    <form action='options.php' method='post'>

        <div class="tau-settings-header">
            <h2>Customize Administration User Interface</h2>
            <h3>powered by</h3>
            <div><img src="<?php echo plugins_url('../assets/logo.png', __FILE__); ?>" style="height:60px;"></div>
        </div>

        <div class="tau-settings">
        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>
        </div>

    </form>
    <?php

}

?>