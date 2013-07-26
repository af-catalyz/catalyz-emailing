<?php

echo $form->renderGlobalErrors();
$choices = $choices->getRawValue();

?>

<label class="radio">
	<?php echo $choices['contact_import_operation_1']['input'];  ?>
	<?php echo $choices['contact_import_operation_1']['label'];  ?>
</label>
<label class="radio">
	<?php echo $choices['contact_import_operation_2']['input'];  ?>
	<?php echo $choices['contact_import_operation_2']['label'];  ?>
</label>

<label class="radio">
	<?php echo $form['new_group']  ?>
	<?php echo $form['new_group']->renderError();  ?>
</label>

<label class="radio">
	<label class="checkbox">
	  <?php echo $form['is_test_group']; ?>
	  <?php echo $form['is_test_group']->renderLabel();  ?>
	</label>
</label>

<?php if(isset($choices['contact_import_operation_3'])): ?>
<label class="radio">
	<?php echo $choices['contact_import_operation_3']['input'];  ?>
	<?php echo $choices['contact_import_operation_3']['label'];  ?>
</label>

<div style="padding-left: 18px;">
	<?php echo $form['existing_groups']  ?>
	<?php echo $form['existing_groups']->renderError();  ?>
</div>

<?php endif; ?>
