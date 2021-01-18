<?php



class Editor {
	
	function __construct() {
		add_action('admin_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_action('admin_menu', array(&$this, 'add_admin_page'));
		add_action( 'wp_ajax_save_editor', array(&$this, 'apollo_ajax_save_editor' ) );
		add_action('wp_head', array(&$this, 'add_custom_style_to_site'), 9999999);
	}
	
	public function add_custom_style_to_site() {
		echo '<style type="text/css">'.stripslashes(get_option('rocket_custom_style_compressed')).'</style>';	
	}

	public function enqueue_scripts() {
		wp_enqueue_script('ace-editor', get_bloginfo('stylesheet_directory') . '/lib/js/ace/ace.js' );
		wp_enqueue_script('editor-js', get_bloginfo('stylesheet_directory') . '/lib/js/editor.js', array('jquery') );
		echo '<script type="text/javascript">var ajax_url = "'.admin_url('admin-ajax.php').'";</script>';
	}
	
	public function add_admin_page() {
		$parent_slug = 'igomoon';
		$page_title = 'Custom CSS';
		$menu_title = 'Custom CSS';
		$capability = 'manage_options';
		$menu_slug = 'custom-css';
		$function = array(&$this, 'display_admin_page');
		$icon_url = '';
		$position = '59';
		
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	//	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	}

	public function display_admin_page(){
	?>
		<div class="wrap">
			<h2>Custom CSS</h2>
			<form method="post">
				<div style="width: 100%; min-height: 800px;" id="rocket_editor"><?php echo (get_option('rocket_custom_style') != '') ? stripslashes(get_option('rocket_custom_style')) : file_get_contents(dirname(__FILE__).'/css/default.css'); ?></div>
				
				<input type="button" id="editor_save" class="button button-primary" value="Save changes" style="float:right;margin-top: 10px;" />
			</form>
		</div>
	<?php
	}

	function apollo_ajax_save_editor() {
	   $data = $_POST['data'];

	   $data_compressed = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $data);
 
	   // Remove space after colons
	   $data_compressed = str_replace(': ', ':', $data_compressed);
 
	   // Remove whitespace
	   $data_compressed = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $data_compressed);

	   if(update_option('rocket_custom_style', $data) && update_option('rocket_custom_style_compressed', $data_compressed)){
	   	echo 1;
	   }else {
	   	echo 0;
	   }
	   die();
	}

}
new Editor;
