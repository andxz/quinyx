<div class="job">
	<?php
	echo '<a href="'.get_permalink().'"><h4>'.get_the_title().'</h4></a>';
	echo mb_substr(get_the_excerpt(),0,180) . '... <br><br>';
	echo  '<a href="'.get_permalink().'">Läs mer »</a>';
	?>
</div>