<div class="page-header">
	<h1>Exporter les statistiques des campagnes</h1>
</div>


<?php include_partial('global/flashMessage') ?>
<form id="export_form2" action="<?php echo url_for('@campaigns_export') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<p>Choisir le type d'export:</p>

					<?php echo $form['type'] ?>
	<br/>


<p>Sélectionnez les campagnes souhaitées dans la liste ci-dessous:</p>
<?php echo $form['campaigns']->renderError() ?>


				<div id="CampaignNotOpenTabs" class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#fragment-1" data-toggle="tab">Actives</a></li>
			<li><a href="#fragment-2" data-toggle="tab">Archivées</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="fragment-1">

			<p><a href="javascript://" class="listen_all">toutes</a>&nbsp;/&nbsp;<a href="javascript://" class="listen_none">aucune</a></p>

				<?php

	$campaigns = CampaignExportStatsForm::getSelectableCampaigns();

if (!empty($campaigns['active']) ) {
	foreach ($campaigns['active'] as $k => $aCampaign) {
		printf('<label class="checkbox"><input type="checkbox" name="campaign_export[campaigns][]" value="%s"/>%s </label>',  $aCampaign->getId(), $aCampaign->getName());
	}
}
else{
	echo '<p>Aucune campagne active.</p>'	;
}
?>
			</div>
			<div class="tab-pane" id="fragment-2">

					<p><a href="javascript://" class="listen_all">toutes</a>&nbsp;/&nbsp;<a href="javascript://" class="listen_none">aucune</a></p>

			<?php

if (!empty($campaigns['archived']) ) {

	$cpt = 1;
	foreach ($campaigns['archived'] as $month => $details) {
		printf('<h4 style="margin-top: 10px;"><i class="icon-plus-sign"></i>&nbsp;<a href="javascript://" id="element_%1$d" class="listen">%2$s %3$s</a></h4><div class="listener" id="sub_element_%1$d"  style="display: none; padding: 0 15px;">',$cpt, ucfirst(CatalyzDate::getFrenchMonth((int) date('m', strtotime($month)))), date('Y', strtotime($month)) );
		foreach ($details as $k => $aCampaign){
			printf('<label class="checkbox"><input type="checkbox" name="campaign_export[campaigns][]" value="%s"/>%s </label>',  $aCampaign->getId(), $aCampaign->getName());
		}

		echo '</div>';
		$cpt++;
	}

}
else{
	echo 'Aucune campagne archivée.'	;
}
?>

			</div>
		</div>
	</div>

	<div class="form-actions">
		<?php
			echo $form->renderHiddenFields(true);
			printf('<input class="btn btn-primary" type="submit" value="%s"/>', __('Exporter'));
		  printf('&nbsp;<a href="%s" class="btn">%s</a>',  url_for('@campaigns'), __('Annuler'));
		?>
	</div>
</form>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$(".listen_all").live("click", function() {
		$(this).parents('.tab-pane').find(' :checkbox').attr('checked', true);
		return false;
	});

	$(".listen_none").live("click", function() {
		$(this).parents('.tab-pane').find(' :checkbox').attr('checked', false);
		return false;
	});


	$(".listen").live("click", function(){
		$('#sub_'+$(this).attr('id')).toggle();

		if ($(this).parents('h4').children('i').attr('class') == 'icon-plus-sign') {
			$(this).parents('h4').children('i').attr('class','icon-minus-sign')
		}
		else{
			$(this).parents('h4').children('i').attr('class','icon-plus-sign')
		}

	});

});

/* ]]> */
</script>