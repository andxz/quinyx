jQuery(document).ready(function ($) {
	
	if($('#rocket_editor').length) {
		var editor = ace.edit("rocket_editor");
		editor.getSession().setMode("ace/mode/css");
		editor.setTheme("ace/theme/xcode");
		$('#editor_save').click(function () {
			$(this).val('Saving...');
			$.post(ajax_url, {
				'action': 'save_editor',
				'data' : editor.getSession().getValue()
			
			}, function (data, error) {
				if(data == 1) {
					$('#editor_save').val('Save changes').css({
						'background': '#2ea2cc',
						'border-color': '#0074a2'
					});
				}else {
					$('#editor_save').val('Could not be saved').css({
						'background-color': '#d9534f',
						'border-color': '#d43f3a'	
					});
				}
			});
		});

		editor.commands.addCommand({
			
			bindKey: {
        			mac:        "Command-S",
        			win:        "Ctrl-S"
    			},
			exec: function () {
				$('#editor_save').val('Saving...');
				$.post(ajax_url, {
					'action': 'save_editor',
					'data' : editor.getSession().getValue()
				
				}, function (data, error) {
					if(data == 1) {
						$('#editor_save').val('Save changes').css({
							'background': '#2ea2cc',
							'border-color': '#0074a2'
						});
					}else {
						$('#editor_save').val('Could not be saved').css({
							'background-color': '#d9534f',
							'border-color': '#d43f3a'	
						});
					}
				});
	
			}
		});
	}
}); 
