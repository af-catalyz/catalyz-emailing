<?php
use_javascript('tiny_mce/tiny_mce');
 ?>

<?php echo $form->renderHiddenFields() ?>
	<div class="control-group">
		<?php printf('<label class="control-label">%s</label>', $form['name']->renderLabel()) ?>
		<div class="controls">
			<?php
	echo $form['name'];
echo $form['name']->renderError();
?>
		</div>
	</div>

   <div class="control-group">
   <?php printf('<label class="control-label">%s</label>', $form['url']->renderLabel()) ?>
   <div class="controls">
   <?php
   echo $form['url'];
   echo $form['url']->renderError();
   ?>
   </div>
   </div>
<div class="control-group">
		<?php printf('<label class="control-label">%s</label>', $form['content']->renderLabel()) ?>
		<div class="controls">
			<?php
	echo $form['content'];
echo $form['content']->renderError();
?>
		</div>
	</div>