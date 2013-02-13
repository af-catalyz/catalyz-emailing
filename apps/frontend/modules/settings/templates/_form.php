	<?php

	echo $form->renderHiddenFields();
	echo $form->renderGlobalErrors();
	$errors = $form->getErrorSchema();

	?>
  <?php  ?>

<div class="control-group">
	<?php printf('<label class="control-label">%s</label>', $form['first_name']->renderLabel()) ?>
	<div class="controls">
		<?php
		echo $form['first_name'];
	echo $form['first_name']->renderError();
	?>
	</div>
</div>

<div class="control-group">
	<?php printf('<label class="control-label">%s</label>', $form['last_name']->renderLabel()) ?>
	<div class="controls">
		<?php
		echo $form['last_name'];
	echo $form['last_name']->renderError();
	?>
	</div>
</div>

	<?php
	$class = '';
if (!empty($errors['email'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>


	<?php printf('<label class="control-label">%s</label>', $form['email']->renderLabel()) ?>
	<div class="controls">
		<?php

	echo $form['email'];
	echo $form['email']->renderError();
	?>
	</div>
</div>

	<?php
	$class = '';
if (!empty($errors['username'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<?php printf('<label class="control-label">%s</label>', $form['username']->renderLabel()) ?>
	<div class="controls">
		<?php
	echo $form['username'];
	echo $form['username']->renderError();
	?>
	</div>
</div>

	<?php
	$class = '';
if (!empty($errors['password'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<?php printf('<label class="control-label">%s</label>', $form['password']->renderLabel()) ?>
	<div class="controls">
		<?php
	echo $form['password'];
	echo $form['password']->renderHelp();
	echo $form['password']->renderError();
	?>
	</div>
</div>

	<?php
	$class = '';
if (!empty($errors['confirmation'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<?php printf('<label class="control-label">%s</label>', $form['confirmation']->renderLabel()) ?>
	<div class="controls">
		<?php
	echo $form['confirmation'];
	echo $form['confirmation']->renderError();
	?>
	</div>
</div>

	<?php
	$class = '';
if (!empty($errors['groups'])) {
	$class = ' error';
}

	printf('<div class="control-group%s">', $class);
	?>
	<?php printf('<label class="control-label">%s</label>', $form['groups']->renderLabel()) ?>
	<div class="controls">
		<?php
	echo $form['groups'];
	echo $form['groups']->renderError();
	?>
	</div>
</div>



  <?php printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Enregistrer'), url_for('@settings')); ?>

