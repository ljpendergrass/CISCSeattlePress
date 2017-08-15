<?php
function frontpage_message() {

$message = get_field('fp_message');
$type = get_field('fp_message_type');
$content = get_field('fp_message_content');
if ( $message == 'On' ) {
	switch ($type) {
		case 'Red':
			$type = "alert";
			break;
		case 'Yellow':
			$type = "warning";
			break;
		case 'Green':
			$type = "success";
			break;
	}
	return '
	<div class="row align-center">
	<div class="callout column ' . $type . '" style="margin-bottom: 0;">
  ' . $content . '
	</div>
	</div>';
}
}

?>
