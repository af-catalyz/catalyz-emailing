<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
  <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

<ul class="nav nav-tabs">
	    <?php
printf('<li><a href="%s">Vue d\'ensemble</a></li>', url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Cibles</a></li>', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
echo '<li class="active"><a href="#1" data-toggle="tab">Clicks </a></li>';
echo '<li><a href="#2" data-toggle="tab">D&eacute;sinscriptions</a></li><li><a href="#3" data-toggle="tab">Erreurs</a></li>';
printf('<li><a href="%s">Configuration des destinataires</a></li>', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
printf('<li><a href="%s">Message</a></li>', url_for('@campaign_statistics_message?slug='.$campaign->getSlug()));
?>
		</ul>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">
    		<div class="span8" id="iframe">
					<iframe name="frame_Liks" src="<?php echo url_for('@campaign_statistics_display_iframe?slug='.$campaign->getSlug()) ?>" scrolling="auto" height="720" width="<?php echo sfConfig::get('app_wysiwyg_width',750)?>" frameborder="1"></iframe>
				</div>
	<?php if (count($links)>0): ?>
	<div id="details" class="span4" style="margin: 0;">
		<p>La liste ci-dessous présente l'ensemble des liens présents dans votre campagne et le nombre de contacts ayant cliqué sur le lien. Si un contact a clické plusieurs fois sur le lien, il n'est comptabilisé qu'une seule fois.</p>
		<table class="table table-striped table-condensed">
		<tr>
			<th>URL</th>
			<th>Nb.</th>
			<th>Details</th>
		</tr>
		<?php
		$links = $links->getRawValue();
arsort($links);
foreach($links as $url => $details): ?>
		<tr>
			<td><a href="<?php echo $url ?>" target="_blank"><?php echo $details['label']!=NULL?$details['label']:$url ?></a></td>
			<td><?php echo shortNumberFormat($details['count']) ?></td>
			<td><?php echo link_to('details',sprintf('@campaign_statistics_show_clicks?id=%s',$details['id'] ), array('class' => 'btn btn-mini')) ?></td>
		</tr>
		<?php endforeach; ?>
		</table>

	</div>
	<?php endif ?>



			</div>
    </div>
</div>