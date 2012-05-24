<?php echo $form->renderHiddenFields() ?>
<fieldset>
	<legend>Informations principales</legend>
	<div class="span5">
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
$errors = $form->getErrorSchema()->getErrors();
printf('<div class="control-group %s">', !empty($errors['email'])?'error':'');
?>
			<?php printf('<label class="control-label">%s</label>', $form['email']->renderLabel()) ?>
			<div class="controls">
				<?php
echo $form['email'];
echo $form['email']->renderError();
?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['company']->renderLabel()) ?>
			<div class="controls">
				<?php
echo $form['company'];
echo $form['company']->renderError();
?>
			</div>
		</div>
	</div>

	<div class="span5">
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['contact_contact_group_list']->renderLabel()) ?>
			<div class="controls">
				<?php
echo $form['contact_contact_group_list'];
echo $form['contact_contact_group_list']->renderError();
?>
			</div>
		</div>
	</div>

</fieldset>

<?php
//region $customFields
$customFields = CatalyzEmailing::getCustomFields();
if (!empty($customFields)){
	printf('<fieldset><legend>%s</legend>', __('Informations complémentaires'));
	foreach ($customFields as $key => $caption){
		printf('<div class="span5"><div class="control-group"><label class="control-label">%s</label><div class="controls">%s%s</div></div></div>', $form[$key]->renderLabel(), $form[$key], $form[$key]->renderError());
	}
	echo '</fieldset>';
}
//endregion

