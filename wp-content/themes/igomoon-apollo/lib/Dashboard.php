<?php


class Dashboard {
	
    public $sent = false;

    public function __construct(){
        add_action('wp_dashboard_setup',array(&$this, 'add_dashboard_widgets'));
    }

    public function add_dashboard_widgets(){
        //Remove other dashboard widgets
        global $wp_meta_boxes;
        global $current_user;
        if(key($current_user->caps) == 'rocket_editor') {
            //Hide the big welcome frame of the dashboard
            remove_action('welcome_panel', 'wp_welcome_panel');

            // Remove all the default dashboard widgets
            unset($wp_meta_boxes['dashboard']);
        }

        // Add the new Rocket dashboard widgets.
        wp_add_dashboard_widget('rocket_welcome_widget', __('The Apollo Rocket'),array(&$this, 'rocket_widget'));
        wp_add_dashboard_widget('rocket_rocket_widget', __('Rocket Support'),array(&$this, 'rocket_widget_widget'));
	wp_add_dashboard_widget('igomoon_news_widget', __('iGoMoon news'),array(&$this, 'igomoon_news_widget'));
    }

    public function rocket_widget(){
    ?>
        <strong><?php _e('Version'); ?>:</strong>  <?php echo ROCKET_VERSION;  ?>
    <?php
    }

    // Todo

    public function rocket_widget_widget(){
	global $current_user;
	if(isset($_POST['customer_name']) && isset($_POST['customer_email']) && isset($_POST['customer_site'])) {
		if(isset($_POST['support_title']) && isset($_POST['support_message'])) {
			if(!empty($_POST['support_title']) && !empty($_POST['support_message'])) {
				$to = 'support@igomoon.com';
				$subject = $_POST['support_title'];
				$headers = array();
				$headers[] = 'From: '.$_POST['customer_name'].' <'.$_POST['customer_email'].'>';
				$headers[] = 'Content-type: text/html; charset="UTF-8"';
				$message = $_POST['customer_site'] . '<br><br>'. nl2br($_POST['support_message']);
				if(wp_mail( $to, $subject, $message, $headers )) {
					echo '<div class="rocket-notice success">' . __('Support ticket was sent. Our support crew will contact you as soon as possible.') . '</div>';
				}else {
					echo '<div class="rocket-notice fail">'. __('Support ticket could not be sent.') .'</div>';
				}
			}else{
				echo '<div class="rocket-notice fail">'. __('Support ticket could not be sent. Subject and message are required.') .'</div>';
			}
		}
	}
	?>
        <strong><?php _e('Phone'); ?>:</strong> <a href="tel:010-410 11 00">010-410 11 00</a><br>
        <strong><?php _e('Email'); ?>:</strong> <a href="mailto:support@igomoon.com">support@igomoon.com</a>
	<form class="support-form" method="post">
		<input type="hidden" name="customer_name" value="<?php echo $current_user->display_name; ?>">
		<input type="hidden" name="customer_email" value="<?php echo $current_user->user_email; ?>">
		<input type="hidden" name="customer_site" value="<?php echo get_bloginfo('url'); ?>">
		<input class="widefat" type="text" name="support_title" placeholder="Subject">
		<textarea name="support_message" rows="6" class="widefat" placeholder="Message"></textarea>
		<input type="submit" value="Send support ticket" class="button button-primary">
	</form>

    <?php
    }

    public function igomoon_news_widget() {
    	$xml = file_get_contents('http://www.igomoon.com/category/blogs/feed/');
	$xml = simplexml_load_string($xml);
	echo '<ul class="igomoon-news-widget">';
	foreach($xml->channel->item as $row) {
		echo '<li>'.date("Y-m-d", strtotime($row->pubDate)).' - <a target="_blank" href="'.$row->link.'">' . $row->title . '</a></li>';
	}
	echo '</ul>';
    }

}
new Dashboard;
