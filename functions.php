// Add Notes menu to admin panel
add_action('admin_menu', 'wp_custom_notes_menu');

function wp_custom_notes_menu() {
    add_menu_page(
        'Notlar',          
        'Notlar',           
        'manage_options',   
        'wp-custom-notes', 
        'wp_custom_notes_page', 
        'dashicons-edit',   
        20                
    );
}

// Settings for saving notes
add_action('admin_init', 'wp_custom_notes_settings');
function wp_custom_notes_settings() {
    register_setting('wp_notes_group', 'wp_custom_notes');
}

// Notes page content
function wp_custom_notes_page() {
    ?>
    <div class="wrap">
        <h1>Notes</h1>
        <form method="post" action="options.php">
            <?php
            // Displaying the settings group and input field
            settings_fields('wp_notes_group');
            do_settings_sections('wp_notes_group');
            ?>
            <textarea name="wp_custom_notes" rows="10" style="width: 100%;"><?php echo esc_attr(get_option('wp_custom_notes', '')); ?></textarea>
            <?php submit_button('Save'); ?>
        </form>
    </div>
    <?php
}
