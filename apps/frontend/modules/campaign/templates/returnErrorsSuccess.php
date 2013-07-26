<?php include_partial('campaign/header',array('campaign' => $campaign)) ?>
<?php $campaign = $campaign->getRawValue(); ?>

<form  class="form-horizontal" action="<?php echo url_for('@campaign_edit_return_errors?slug='.$campaign->getSlug()) ?>" method="post" >
<?php
	echo $form->renderHiddenFields();
	$errors = $form->getErrorSchema();
?>



	<fieldset>
		<legend>Champ "Return-Path"</legend>
		<p>Lorsqu'une erreur intervient sur la livraison d'un email à un de vos contacts, les serveurs d'emails renvoient une réponse expliquant la raison du problème à une adresse spécifique.</p>

				<?php
					$class = '';
if (!empty($errors['return_path_email'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>
			<label class="control-label"><?php echo $form['return_path_email']->renderLabel(); ?></label>
			<div class="controls">
				<?php echo $form['return_path_email'] ?>
				<?php echo $form['return_path_email']->renderError(); ?>
				<?php echo $form['return_path_email']->renderHelp() ?>
			</div>
		</div>

		<?php if (sfConfig::get('app_settings_display_campaign_parameters', true)) : ?>
			<p>Afin d'analyser ces emails d'erreur de livraison, l'application va se connecter régulièrement à la boite aux lettres et a besoin de ces informations d'accès.<br />Précisez ci-dessous les informations de connexion à la boite aux lettres.</p>

					<?php
$class = '';
		if (!empty($errors['return_path_server'])) {
			$class = ' error';
		}

printf('<div class="control-group%s">', $class);
?>
				<label class="control-label"><?php echo $form['return_path_server']->renderLabel(); ?></label>
				<div class="controls">
					<?php echo $form['return_path_server'] ?>
					<?php echo $form['return_path_server']->renderError(); ?>
					<?php echo $form['return_path_server']->renderHelp() ?>
				</div>
			</div>

					<?php
						$class = '';
		if (!empty($errors['return_path_login'])) {
			$class = ' error';
		}

printf('<div class="control-group%s">', $class);
?>
				<label class="control-label"><?php echo $form['return_path_login']->renderLabel(); ?></label>
				<div class="controls">
					<?php echo $form['return_path_login'] ?>
					<?php echo $form['return_path_login']->renderError(); ?>
					<?php echo $form['return_path_login']->renderHelp() ?>
				</div>
			</div>

					<?php
						$class = '';
		if (!empty($errors['return_path_password'])) {
			$class = ' error';
		}

printf('<div class="control-group%s">', $class);
?>
				<label class="control-label"><?php echo $form['return_path_password']->renderLabel(); ?></label>
				<div class="controls">
					<?php echo $form['return_path_password'] ?>
					<?php echo $form['return_path_password']->renderError(); ?>
					<?php echo $form['return_path_password']->renderHelp() ?>
				</div>
			</div>
		<?php endif ?>
	</fieldset>

	<br />
	<div class="form-actions">
	<?php
	if ($campaign->getStatus()< Campaign::STATUS_SENDING) {
		echo '<input type="submit" name="Save" value="Enregistrer" class="btn btn-primary" />';
	} ?>
	</div>

</form>