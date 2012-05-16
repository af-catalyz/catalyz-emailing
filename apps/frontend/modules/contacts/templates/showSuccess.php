<?php

echo '<div class="page-header">';
//region first line
echo '<h1>';
printf('<img src="http://www.gravatar.com/avatar/%s?s=60&amp;d=mm" class="pull-left" style="margin-right: 10px;" />', md5($contact->getEmail()));
echo $contact->getFullName();
if ($contact->getCompany()) {
	printf('&nbsp;<small>%s</small>', $contact->getCompany());
}
printf('&nbsp;<a href="%s" class="btn btn-mini">%s</a>', url_for('@contact_edit?slug=' . $contact->getSlug()),__('modifier'));
echo '</h1>';
//endregion

//region second line
echo '<h3>';
	printf('<small><a href="mailto:%1$s"><u class="icon-envelope"></u></a>&nbsp;%1$s</small>&nbsp;', $contact->getEmail());

	if (count($contact->getGroups()) > 0) {
		echo '<div>';
		foreach ($contact->getGroups() as /*(ContactGroup)*/$group){
			echo html_entity_decode($group->getColoredName(true)).'&nbsp;';
		}
		echo '</div>';
	}
echo '</h3>';
//endregion

echo '</div>';

$customFields = CatalyzEmailing::getCustomFields();
?>

<?php include_partial('global/flashMessage') ?>

<div class="tabbable">
	<?php if (!empty($customFields)):?>
	<ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Historique</a></li>
    <li><a href="#2" data-toggle="tab">Informations détaillées</a></li>
   </ul>
  <?php endif ?>

	<div class="tab-content">
    <div class="tab-pane active" id="1">

    <?php if ($contact->getStatus() != Contact::STATUS_NEW) {
    	printf('<div class="alert alert-danger"><p>Ce contact a été désactivé suite à la réception de la notification d\'une erreur. Vous pouvez réactiver ce contact en %s.</p></div>', link_to(__('cliquant ici'), '@contact_reintroduce?slug=' . $contact->getSlug(),array('class' =>'btn btn-mini')));
    } ?>

    <?php if (count($CampaignContacts) == 0) : ?>
<p>Ce contact n'a reçu aucune campagne.</p>
	<?php else: ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Campagne</th>
			<th>Envoyée le</th>
			<th>Ouverte le</th>
			<th>Clics</th>
			<th>Bounce</th>
			<th>Désinscrit le</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($CampaignContacts as/*(CampaignContact)*/ $CampaignContact):
			$Campaign = $CampaignContact->getCampaign();
		?>
		<tr>
			<td>
				<?php printf('<a href="%s">%s</a>', 'javascript://', $Campaign->getName())?>
				<a class="btn btn-mini" data-toggle="modal" href="#myModal2" >renvoyer</a>
			</td>
			<td><?php echo CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())) ?></td>
			<td><?php echo CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())) ?></td>
			<td>
				<?php
					if ($CampaignContact->getClickedAt(null)) {
						if (count($CampaignContact->getCampaignClicks()) > 0) {
							printf('<span class="badge">%s</span>', count($CampaignContact->getCampaignClicks()));
							echo '&nbsp;<a class="btn btn-mini" data-toggle="modal" href="#myModal" class="withajaxpopover" >détails</a>';
						}
					}
				?>
			</td>
			<td><?php echo html_entity_decode($CampaignContact->getBounceLabel()); ?></td>
			<td>
			<?php
			if ($CampaignContact->getUnsubscribedAt()) {
				echo CatalyzDate::formatShort(strtotime($CampaignContact->getUnsubscribedAt()))."&nbsp;";
			}
			if ($contact->getStatus()!=Contact::STATUS_UNSUBSCRIBED) {
				echo link_to(__('désinscrire'), sprintf('@contact_do_unsubscribe?id=%s&campaignId=%s', $contact->getId(),$Campaign->getId()),array('class' => 'btn btn-danger btn-mini','title' => 'Désinscrire ce contact', 'post' => true, 'confirm' => sprintf('Souhaitez vous désinscrire le contact "%s" de façon définitive?', $contact->getFullName())));
			}
			?>
			</td>
		</tr>

		<?php endforeach ?>
	</tbody>
</table>


		<?php endif ?>




    </div>
    <?php if (!empty($customFields)):?>
		<div class="tab-pane" id="2"> <!-- custom fields-->
			<form action="javascript://" class="form-horizontal">

			<?php

			$firstSlice = array_slice($customFields, 0, floor(sfConfig::get('app_fields_count', 10)/2), true);
			$secondSlice = array_slice($customFields, ceil(sfConfig::get('app_fields_count', 10)/2), null,true);
    	foreach (array($firstSlice, $secondSlice) as $tab){
    		if (!empty($tab)) {
    			echo '<div class="span5">';
    			foreach ($tab as $key => $caption){
    				printf('<div class="control-group"><label class="control-label">%s</label><div class="controls"><span class="input-xlarge uneditable-input">%s</span></div></div>',
    					$caption,
    					$contact->getFieldValue($key)
						);
    			}
    			echo '</div>';
    		}
    	}
			 ?>


			</form>
    </div><!-- end custom fields-->
    <?php endif ?>
    </div>
  </div>



<div class="modal fade" id="myModal" style="display: none"><!-- modal 1-->
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Détail des clicks</h3>
	</div>
	<div class="modal-body">
		<p><strong>Sébastien Hordeaux</strong> a clické sur les liens suivants de la campagne <a href="">Campagne 1</a>:</p>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Lien</th>
					<th>Click le</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="" target="_blank">Lien 1</a></td>
					<td>02/04/2012 à 12:37</td>
				</tr>
				<tr>
					<td><a href="" target="_blank">Lien 2</a></td>
					<td>02/04/2012 à 12:37</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-primary">Fermer</a>
	</div>
</div><!-- end modal 1-->


<div class="modal fade" id="myModal2" style="display: none"><!-- modal 2-->
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Renvoi de campagne</h3>
	</div>
	<div class="modal-body">
		<p>Souhaitez-vous renvoyer la campagne <strong>Campagne 1</strong> à <strong>Sébastien Hordeaux</strong>?</p>
		<p class="muted">Vous pouvez également transmettre le lien suivant à votre campagne pour consulter la campagne en ligne avec ses informations de personnalisations spécifiques:</p>
		<pre class="muted">http://kreactiv.catalyz-emailing.com/foo/bar/dsdnfqjdqsiojdsqo</pre>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn">Non, ne pas renvoyer la campagne</a>
		<a href="#" class="btn btn-primary">Oui, renvoyer la campagne</a>
	</div>
</div><!-- end modal 2-->


<script type="text/javascript">
/* <![CDATA[ */


$(document).ready(function() {
	$('.withajaxpopover').bind('hover',function(){
		var el=$(this);
		$.get(el.attr('data-load'),function(d){
			el.unbind('hover').popover({content: d}).popover('show');
		});
	});
});



/* ]]> */
</script>
