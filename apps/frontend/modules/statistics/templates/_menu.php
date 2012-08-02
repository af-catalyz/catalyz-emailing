   <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

		<ul class="nav nav-tabs">
	    <?php
	    echo '<li><a data-toggle="tab" href="#1"></a></li>';
	    printf('<li%s><a href="%s">Vue d\'ensemble</a></li>', $sf_context->getActionName() == 'index'?' class="active"':'',url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Cibles</a></li>', $sf_context->getActionName() == 'targets'?' class="active"':'', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Ouvertures</a></li>', $sf_context->getActionName() == 'views'?' class="active"':'', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Clics</a></li>', $sf_context->getActionName() == 'showLinks'?' class="active"':'', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">D&eacute;sinscriptions</a></li>', $sf_context->getActionName() == 'unsubscribe'?' class="active"':'', url_for('@campaign_statistics_unsubscribe?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Erreurs</a></li>', $sf_context->getActionName() == 'returnErrors'?' class="active"':'', url_for('@campaign_statistics_return_errors?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Configuration des destinataires</a></li>', $sf_context->getActionName() == 'showBrowser'?' class="active"':'', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
	    printf('<li%s><a href="%s">Message</a></li>', $sf_context->getActionName() == 'message'?' class="active"':'', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
	    ?>
		</ul>


<div class="modal hide fade" id="dialog-campaign-test">
	<form  action="<?php echo url_for('@campaign_do_create_relance?slug='.$campaign->getSlug()) ?>" method="post">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Créer une relance</h3>
		</div>
		<div class="modal-body">
			<p>Vous allez créer une nouvelle campagne reprenant les informations de la campagne pour pouvoir effectuer une relance. A qui souhaitez-vous qu'elle soit envoyée?</p>

			<label class="radio">
				<input type="radio" name="type" value="<?php echo Campaign::RELANCE_OPEN ?>" /> Sur les contacts ayant ouvert la campagne
			</label>
			<label class="radio">
				<input type="radio" name="type" value="<?php echo Campaign::RELANCE_NO_OPEN ?>" checked="checked"/> Sur les contacts n'ayant pas ouvert la campagne
			</label>
		</div>
		<div class="modal-footer">
			<a href="javascript://" class="btn close_tag">Annuler</a>&nbsp;
			<input type="submit" value="Créer la relance" class="btn btn-primary"/>
		</div>
	</form>
</div>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('.modal-footer a.close_tag, .modal-header a').live('click',function(){
		$('.modal').modal('hide');
		$('.modal-backdrop').hide();
		return false;
	});
});

/* ]]> */
</script>