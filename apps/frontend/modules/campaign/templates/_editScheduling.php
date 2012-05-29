<?php $choices = $choices->getRawValue(); ?>


<label class="radio">
	<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['input'];  ?>
	<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_NAME]['label'];  ?>

	<span class="hint">Laissez la campagne dans cet état tant qu'elle est en cours de conception</span>
</label>
<label class="radio">
	<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['input'];  ?>
	<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_SUBJECT]['label'];  ?>

	<span class="hint">Démarrera l'envoi quelques minutes après la sauvegarde du formulaire.</span>
</label>


		<?php
		$errors = $form->getErrorSchema();

$class = '';
if (!empty($errors['scheduled_at'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);

?>
	<label class="radio">
		<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['input'];  ?>
		<?php echo $choices['campaign_schedule_type_'.Campaign::ANALYTICS_CAMPAIGN_CUSTOM]['label'];  ?>
		<?php echo $form['scheduled_at']; ?>
		<?php echo $form['scheduled_at']->renderError(); ?>
		<br/>
		<span class="hint">Démarrera l'envoi à partir de la date précisée. Vous pourrez continuer à modifier toute la configuration de votre campagne jusqu'à cette date (contenu, destinataires...).</span>
	</label>
</div>

<?php use_stylesheet('/css/ui-lightness/jquery-ui-1.8.20.custom.css') ?>
<?php use_javascript('/js/jquery-ui-1.8.20.custom.min.js', 'last') ?>
<?php use_javascript('/js/jquery-ui-timepicker-addon.js', 'last') ?>
<script type="text/javascript">
$("#campaign_scheduled_at").datetimepicker(

{
	closeText: 'Fermer',
	prevText: '&#x3c;Préc',
	nextText: 'Suiv&#x3e;',
	currentText: 'Courant',
	monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
	'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
	monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
	'Jul','Aoû','Sep','Oct','Nov','Déc'],
	dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
	dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
	dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
	dateFormat: 'dd/mm/yy', firstDay: 1,
	showSecond: false,
	timeFormat: 'hh:mm',
	isRTL: false,
	duration: '',
	showTime: true,
	alwaysSetTime: true,
	constrainInput: false,
	minDate: 0,
	timeText: 'Heure programmée',
	hourText: 'Heure',
	minuteText: 'Minute',
	currentText: 'Maintenant'
}

);

</script>
