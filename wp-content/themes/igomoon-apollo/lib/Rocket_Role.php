<?php


class Rocket_Role {
    public function Rocket_Role(){
        add_action('init', array(&$this, 'add_roles'));
        add_action('init', array(&$this, 'remove_roles'));
        add_action('admin_footer', array(&$this, 'admin_footer'));
        add_filter('pre_option_default_role', array(&$this, 'change_default_role'));
    }

    public function add_roles(){
        remove_role('rocket_editor');
        $editor_added = add_role(
            'rocket_editor',
            __( 'Rocket Editor', 'rocket' ),
            array(
                'read'                  => true,
                'edit_posts'            => true,
                'delete_posts'          => true,
                'publish_posts'         => true,
                'delete_published_posts'=> true,
                'edit_published_posts'  => true,
                'upload_files'          => true,
                'edit_theme_options'    => true,
                'edit_pages'            => true,
                'edit_others_pages'     => true,
                'edit_published_pages'  => true,
                'publish_pages'         => true,
                'delete_pages'          => true,
                'delete_others_pages'   => true,
                'delete_published_pages'=> true,
                'delete_others_posts'   => true,
            )
        );

        if($editor_added) {
            return true;
        }

        return false;
    }

    public function remove_roles() {
        remove_role( 'subscriber' );
        remove_role( 'editor' );
        remove_role( 'contributor' );
        remove_role( 'author' );

    }

    public function change_default_role($default_role){
        return 'rocket_editor';
    }

    public function admin_footer(){
        if ( is_user_logged_in() ) { // This IF may be redundant, but safe is better than sorry...
            global $current_user;

            if ( key($current_user->caps) === 'rocket_editor' ) { // Check if non-Admin

                ?>
                <style>
                    li#menu-appearance.wp-has-submenu li a[href="themes.php"],
                    li#menu-appearance.wp-has-submenu li a[href="customize.php"],
                    li#menu-appearance.wp-has-submenu li a[href="themes.php?page=custom-header"],
                    li#menu-appearance.wp-has-submenu li a[href="themes.php?page=custom-background"],
                    .genesis-separator,
                    .toplevel_page_genesis {
                        display:none;
                    }



                </style>
                <script>
                    jQuery.noConflict();
                    jQuery(document).ready(function() {
                        //  Comment out the line you WANT to enable, so it displays (is NOT removed).
                        //  For example, the jQuery line for MENUS is commented out below so it's not removed.

                        // THEMES:  If you want to allow THEMES, also comment out APPEARANCE if you want it to display Themes when clicked. (Default behaviour)
                        jQuery('li#menu-appearance.wp-has-submenu li a[href="themes.php"]').remove();
                        jQuery('li#menu-appearance.wp-has-submenu a.wp-has-submenu').removeAttr("href");
                        jQuery('.toplevel_page_genesis').remove();
                        // WIDGETS:
                        //jQuery('li#menu-appearance.wp-has-submenu li a[href="widgets.php"]').remove();
                        jQuery('li#menu-appearance.wp-has-submenu li a[href="customize.php"]').remove();
                        jQuery('li#menu-appearance.wp-has-submenu li a[href="themes.php?page=custom-header"]').remove();

                        // MENUS:
                        // jQuery('li#menu-appearance.wp-has-submenu li a[href="nav-menus.php"]').remove();

                        // BACKGROUND:
                        jQuery('li#menu-appearance.wp-has-submenu li a[href="themes.php?page=custom-background"]').remove();
                    });
                </script>
            <?php
            } // End IF current_user_can...
        }
    }
}

new Rocket_Role;