<?php

use_javascript('/js/highcharts.js');
use_javascript('/js/exporting.js');

$campaign = /*campaign*/$campaign->getRawValue();

//region header
echo '<div class="page-header">';

$picture_src = 'http://placehold.it/80x60';
if ($campaign->getCampaignTemplate()->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())) {
	$picture_src = thumbnail_path($campaign->getCampaignTemplate()->getPreviewFilename(), 80, 60);
}

printf('<img src="%s" alt="" class="pull-left" style="margin-right: 10px;" />', $picture_src);
printf('<h1>%s%s</h1>', $campaign->getName(), $campaign->getCommentPopup());

?>
<?php if(count($other_campaigns)>0): ?>
   <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-compare">Comparer avec une autre campagne</a>
<?php endif; ?>
<?php
printf('<h3><small>Cr&eacute;&eacute; %s le %s%s</small></h3>',
	$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'',
	CatalyzDate::formatShortWithTime(strtotime($campaign->getCreatedAt())),
	$campaign->getSendStart()!=null?sprintf(' envoy&eacute;e le %s', CatalyzDate::formatShortWithTime($campaign->getSendStart())):''

	);
echo '</div>';
//endregion


?>
<?php if(count($other_campaigns)>0): ?>
<div class="modal hide fade" id="dialog-campaign-compare">
	<form  action="<?php echo url_for('@campaign_statistics_compare?slug='.$campaign->getSlug()) ?>" method="post">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Comparer les statistiques avec une autre campagne</h3>
		</div>
		<div class="modal-body">
			<p>Avec quelle autre campagne souhaitez-vous comparer les performances de la campagne <b><?php echo $campaign->getName(); ?></b>?</p>
			<select name="campaign" class="input-block-level">
			<?php foreach($other_campaigns as $campaignId => $campaignName){
			printf('<option value="%d">%s</option>', $campaignId, $campaignName);
			} ?>

			</select>

		</div>
		<div class="modal-footer">
			<a href="javascript://" class="btn close_tag">Annuler</a>&nbsp;
			<input type="submit" value="Comparer" class="btn btn-primary"/>
		</div>
	</form>
</div>
<?php endif; ?>

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