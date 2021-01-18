<?php

class Admin_panel {
	

	public function __construct() {
		add_action( 'admin_menu', array(&$this, 'add_admin_page' ) );
		add_action( 'admin_enqueue_scripts', array(&$this, 'admin_scripts' ) );
		add_action( 'wp_ajax_save_favicon', array(&$this, 'rocket_ajax_save_favicon' ) );
		add_action( 'wp_ajax_save_searchtext', array( &$this, 'rocket_ajax_save_searchtext' ) );
		

		add_filter( 'genesis_search_text', array(&$this, 'custom_search_text') );
		add_filter( 'genesis_pre_load_favicon', array(&$this, 'set_favicon' ) );

	}

	public function add_admin_page() {
		$page_title = 'iGoMoon';
		$menu_title = 'iGoMoon';
		$capability = 'manage_options';
		$menu_slug = 'igomoon';
		$function = array(&$this, 'generate_admin_page');
		$icon_url = '';
		$position = '59';

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	}
	
	public function admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
		wp_enqueue_script('igomoon-script', get_bloginfo('stylesheet_directory') . '/lib/js/admin.js', array('jquery'));
	}

	
	//Ajax save favicon
	public function rocket_ajax_save_favicon() {
		$url = $_POST['favicon'];
		
		$file_name_arr = explode('/', $url);
		$file_name = $file_name_arr[count($file_name_arr)-1];
		$extension_arr = explode('.', $file_name);
		$extension = $extension_arr[count($extension_arr)-1];

		if($extension == 'ico') {
			update_option('rocket_favicon_url', $url);
			echo 'Succesfully saved.';
		}else {
			echo 'Could not save favicon. Has to have extension ".ico"';
		}
		die();
	}
	
	// Customize search form input box text
	function custom_search_text($text) {
		if(get_option('rocket_search_text')) {
			return esc_attr(get_option('rocket_search_text'));
		}else {
			return esc_attr( 'Search...' );
		}
	}

	public function rocket_ajax_save_searchtext() {
		if(isset($_POST['data']) && !empty($_POST['data'])) {
			$search_text = $_POST['data'];
			if(update_option('rocket_search_text', $search_text)) {
				echo 1;
			}else {
				echo 0;
			}
		}else {
			echo 0;
		}
		die();
	}

	public function generate_admin_page() {
		?>
		<div class="wrap">
			<h2>iGoMoon</h2>
			<div class="">
				<h4>Favicon</h4>
				<?php echo (get_option('rocket_favicon_url')) ? '<input type="text" class="smallfat" disabled value="' . get_option('rocket_favicon_url') . '">' : '-' ?>
				<button type="button" class="upload_image_button button">Upload Favicon</button>
			</div>
			<div class="">
				<h4>Search field text</h4>
				<input type="text" class="new-search-text" value="<?php echo get_option('rocket_search_text'); ?>" placeholder="Search.." /><button type="button" class="new-search-button button">Save</button>
			</div>
			

			<?php // TODO - alot of themes visual settings. ?>

		</div>
	<?php
	}

	public function set_favicon($favicon_url) {
		return get_option('rocket_favicon_url');
	}
}
new Admin_panel;






