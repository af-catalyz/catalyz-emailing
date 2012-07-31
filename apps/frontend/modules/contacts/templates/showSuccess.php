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

	<ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Historique</a></li>
    <li><a href="#2" data-toggle="tab">Informations détaillées</a></li>
   </ul>


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
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($CampaignContacts as/*(CampaignContact)*/ $CampaignContact):
			$Campaign = $CampaignContact->getCampaign();

		?>
		<tr>
			<td>


				<?php

				echo '<div class="declenche-resend-modal">';
				printf('%s', $Campaign->getName());
				printf('&nbsp;<a class="btn btn-mini listen_modal" data-toggle="modal" name="%s" rel="%s" href="%s" >renvoyer</a>', $Campaign->getName(), $CampaignContact->getId(), $Campaign->getId());
				echo '</div>';
			?>

			</td>
			<td><?php echo CatalyzDate::formatShort(strtotime($CampaignContact->getSentAt())) ?></td>
			<td><?php echo CatalyzDate::formatShort(strtotime($CampaignContact->getViewAt())) ?></td>
			<td>
				<?php
					if ($CampaignContact->getClickedAt(null)) {
						if (count($CampaignContact->getCampaignClicks()) > 0) {
							echo '<div class="declenche-click-modal">';
							printf('<span class="badge">%s</span>', count($CampaignContact->getCampaignClicks()));
							printf('&nbsp;<a class="btn btn-mini" data-toggle="modal" href="%s">détails</a>', url_for(sprintf('@contact_display_clicks?id=%s&campaignId=%s',$CampaignContact->getContactId() , $CampaignContact->getCampaignId())) );
							echo '</div>';
						}
					}
				?>
			</td>
			<td><?php echo html_entity_decode($CampaignContact->getBounceLabel()); ?></td>

			<?php
			printf('<td nowrap="nowrap"><div class="btn-group"><a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">%s&nbsp;<span class="caret"></span></a>
													    	<ul class="dropdown-menu">
														    	<li>%s</li>
														    </ul>
													    </div>
													</td>',
			__('Action'),
			link_to(sprintf('<i class="icon-eye-open"></i> %s', __('Voir les statistiques')), '@campaign_statistics_summary?slug='.$CampaignContact->getCampaign()->getSlug(), array('title' => __('Voir les statistiques')))
			);
			?>

		</tr>

		<?php endforeach ?>
	</tbody>
</table>

		<?php endif ?>


    </div>

		<div class="tab-pane" id="2"> <!-- custom fields-->
			<form action="javascript://" class="form-horizontal">
			<?php



			$allfields = array();
			$allfields['FIRST_NAME'] = ContactPeer::getFieldLabel('FIRST_NAME');
			$allfields['LAST_NAME'] = ContactPeer::getFieldLabel('LAST_NAME');
			$allfields['COMPANY'] = ContactPeer::getFieldLabel('COMPANY');
			$allfields['EMAIL'] = ContactPeer::getFieldLabel('EMAIL');

			if (!empty($customFields)) {
				$allfields = array_merge($allfields, $customFields);
			}



		$firstSlice = array_slice($allfields, 0, floor(sfConfig::get('app_fields_count', 14)/2), true);
		$secondSlice = array_slice($allfields, ceil(sfConfig::get('app_fields_count', 14)/2), null,true);
		foreach (array($firstSlice, $secondSlice) as $tab){
			if (!empty($tab)) {
				echo '<div class="span5">';
				foreach ($tab as $key => $caption){
					printf('<div class="control-group"><label class="control-label">%s</label><div class="controls"><span class="input-xlarge uneditable-input">%s</span></div></div>',
						$caption,
						$contact->getFieldValue(strtoupper($key))
						);
				}
				echo '</div>';
			}
		}



			 ?>

			</form>
    </div><!-- end custom fields-->
    <div class="clear"></div>



    </div>
  </div>


<?php
//region clicks modal
	printf('<div class="modal fade" id="clickModal" style="display: none"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>%s</h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn btn-primary close_tag">%s</a></div></div>', __('Détail des clicks'), __('Fermer'));
//endregion

?>


<div class="modal fade" id="resendModal" style="display: none"><!-- modal 2-->
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Renvoi de campagne</h3>
	</div>
	<div class="modal-body">
		<?php printf('<p>Souhaitez-vous renvoyer la campagne <strong id="campaign_name">Campagne 1</strong> à <strong>%s</strong>?</p>', $contact->getFullName()) ?>
		<p class="muted">Vous pouvez également transmettre le lien suivant à votre campagne pour consulter la campagne en ligne avec ses informations de personnalisations spécifiques:</p>
		<?php printf('<pre class="muted" id="campaign_short_url"></pre>') ?>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn close_tag">Non, ne pas renvoyer la campagne</a>
		<a href="#" id="resend_button" class="btn btn-primary">Oui, renvoyer la campagne</a>
	</div>
</div><!-- end modal 2-->



<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('div.declenche-click-modal').on('click','a',function(){
		var url = $(this).attr('href');

		$('#clickModal .modal-body').load(url,function(){
			$(this).modal({
				keyboard:true,
				backdrop:true
			});
		});

		$('#clickModal').modal('show');
	});


	$('.modal-footer a.close_tag, .modal-header a').live('click',function(){
		$('.modal').modal('hide');
		$('.modal-backdrop').hide();
		return false;
	});



	$('div.declenche-resend-modal ').on('click','a.listen_modal',function(){
		var title = $(this).attr('name');
		var url = "<?php echo url_for('@campaign_do_resend?id=') ?>" ;

		url += $(this).attr('rel');

		$('#campaign_name').empty().append(title);
		$('#resend_button').attr('href',url);

		var friendly_url = "<?php echo url_for1('@view-online?key='.$contact->getEmail(), true) ?>-"
		var friendly_url_end = "-<?php echo md5($contact->GetEmail() . sfConfig::get('app_seed')) ?>"

		friendly_url += $(this).attr('href');
		friendly_url += friendly_url_end;

		$('#campaign_short_url').empty().append(friendly_url);
		$('#resendModal').modal('show');
	});

});


/* ]]> */
</script>
