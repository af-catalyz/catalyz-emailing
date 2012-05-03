<div style="text-align:center;"> <?php echo image_tag('logo.png'); ?> </div>

<?php if ($form->getErrorSchema()->count() > 0): ?>
  <div class="span5 offset3 alert alert-error">
   <a class="close" data-dismiss="alert">×</a>
   <?php printf('<h4 class="alert-heading">%s</h4>%s', __('Erreur de connexion!'), __('Ces informations ne permettent pas de vous identifier, essayez à nouveau...')) ?>
  </div>
<?php endif; ?>

<div class="span3 offset4">
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
		<?php echo $form->renderHiddenFields() ?>
		<div class="well">
			<div class="control-group">
				<label class="control-label"><?php echo $form['username']->renderLabel() ?></label>
				<div class="controls">
					<?php echo $form['username']; ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo $form['password']->renderLabel() ?></label>
				<div class="controls">
					<?php echo $form['password']; ?>
				</div>
					<label class="checkbox">
						<?php echo $form['remember']; ?>
						<?php echo $form['remember']->renderLabel() ?>
					</label>
			</div>
			<div>
				<input type="submit" class="btn btn-primary" value="<?php echo __('Connexion &raquo;') ?>"/>
			</div>
		</div>
	</form>
</div>