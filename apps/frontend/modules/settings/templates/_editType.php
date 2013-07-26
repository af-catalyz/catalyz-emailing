<?php

$errors = $form->getErrorSchema();
 ?>


<label class="radio">
	<?php
		echo html_entity_decode($choices['unsubscribed_conf_type_1']['input']);
		echo html_entity_decode($choices['unsubscribed_conf_type_1']['label']);
	?>
</label>

	<?php
	$class = '';
if (!empty($errors['conf_content'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<div class="controls">
		<?php
			echo $form['conf_content'];
			echo $form['conf_content']->renderError();
		?>
	</div>
</div>

<label class="radio">
	<?php
		echo html_entity_decode($choices['unsubscribed_conf_type_2']['input']);
		echo html_entity_decode($choices['unsubscribed_conf_type_2']['label']);
	?>
</label>

	<?php
	$class = '';
if (!empty($errors['conf_url'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<div class="controls">
		<?php
			echo (string)$form['conf_url'];
			echo $form['conf_url']->renderError();
		?>
	</div>
</div>