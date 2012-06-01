<h2>Ajouter à la liste des destinataires, les contacts ayant ouvert certaines de vos campagnes précédentes</h2>
<?php echo form_tag('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.$providerName, array('method' => 'POST')) ?>

			<?php if ($selectedCampaigns): ?>
					<?php foreach($selectedCampaigns as $item){
						printf('<input type="hidden" name="campaigns[]" value="%s" />', $item->getId());
					} ?>


			<?php endif ?>

			<p>Sélectionnez les campagnes souhaitées dans la liste ci-dessous:</p>



	<div id="CampaignNotOpenTabs" class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#fragment-1" data-toggle="tab">Actives</a></li>
			<li><a href="#fragment-2" data-toggle="tab">Archivées</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="fragment-1">
				<?php

	if (!empty($campaigns['active']) ) {
		foreach ($campaigns['active'] as $k => $aCampaign) {
			printf('<label class="checkbox"><input type="checkbox" name="campaigns[]" value="%s"/>%s </label>',  $aCampaign->getId(), $aCampaign->getName());
		}
	}
	else{
		echo '<p>Aucune campagne active.</p>'	;
	}
				 ?>
			</div>
			<div class="tab-pane" id="fragment-2">

			<?php

	if (!empty($campaigns['archived']) ) {

		$cpt = 1;
		foreach ($campaigns['archived'] as $month => $details) {
			printf('<h4 style="margin-top: 10px;"><i class="icon-plus-sign"></i>&nbsp;<a href="javascript://" id="element_%1$d" class="listen">%2$s %3$s</a></h4><div class="listener" id="sub_element_%1$d"  style="display: none; padding: 0 15px;">',$cpt, CatalyzDate::getFrenchMonth((int) date('m', strtotime($month))), date('Y', strtotime($month)) );
			foreach ($details as $k => $aCampaign){
				printf('<label class="checkbox"><input type="checkbox" name="campaigns[]" value="%s"/>%s </label>',  $aCampaign->getId(), $aCampaign->getName());
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





			<br />
			<input class="btn btn-primary" type="submit" name="Add" value="Ajouter" />

</form>

<script type="text/javascript">

$(document).ready(function() {
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
</script>