jQuery(document).ready(function ($) {
	
	if($('.color-picker').length)
		$('.color-picker').wpColorPicker();

	var custom_uploader;
	$('.upload_image_button').click(function(e) {
	$this = $(this);
	e.preventDefault();
	//If the uploader object has already been created, reopen the dialog
	if (custom_uploader) {
		custom_uploader.open();
		return;
	}
	//Extend the wp.media object
	custom_uploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose Image',
		button: {
			text: 'Choose Image'
		},
		multiple: false
	});
	//When a file is selected, grab the URL and set it as the text field's value
	custom_uploader.on('select', function() {
		attachment = custom_uploader.state().get('selection').first().toJSON();
		$this.prev().val(attachment.url);
		
		$.post(ajaxurl, {
			'action': 'save_favicon',
			'favicon': attachment.url
		}, function (data) {
			$this.prev().before('<span class="upload-error">'+data+'</span>');
		});
	});
	//Open the uploader dialog
	custom_uploader.open();
	});
	
	$('.new-search-button').click(function () {
		$.post(ajaxurl, {
			'action': 'save_searchtext',
			'data': $('.new-search-text').val()
		}, function (data) {
			$('.new-search-button').after('<span class="saved-alert" style="margin-left:5px;">Saved!</span>');
			setTimeout(function () {
				$('.saved-alert').remove();
			}, 3000);
		});

	});
	

});
