<?php $configuration = $configuration->getRawValue() ?>
<?php echo $configuration['qualif_header'] ?>
	<form id="unsubscribed_configuration_form" action="<?php echo url_for('@unsubscribeStep');?>" method="post">

	<?php
	echo $form->renderHiddenFields();
echo $configuration['qualif_motif_introduction'];
echo $form['raison'];
if (!empty($configuration['qualif_list_enabled'])) {
    echo $configuration['qualif_list_introduction'];

		echo $form['qualif_list_publication'];
		echo $form['qualif_list_publication']->renderError();
}

echo $form['email'];
echo $form['campaignId'];

?>
		<br />
		<br />
		<input type="submit" value="Enregistrer" />
	</form>
<?php echo $configuration['qualif_footer'] ?>