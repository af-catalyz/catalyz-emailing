<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
<?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">
    		<div class="span8" id="iframe_holder">
					<iframe id="iframe" name="frame_Liks" src="<?php echo url_for('@campaign_statistics_display_iframe?slug='.$campaign->getSlug()) ?>" scrolling="auto" height="720" width="<?php echo sfConfig::get('app_wysiwyg_width',750)?>" frameborder="1"></iframe>
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
<?php printf('<a class="btn" href="%s"><i class="icon-download"></i> %s</a>', url_for('@campaign_statistics_do_export_clicks?slug='.$campaign->getSlug()), __('Télécharger la liste')) ?>
	</div>
	<?php endif ?>



			</div>
    </div>
</div>

<script type="text/javascript">
/* <![CDATA[ */

$(window).load(function(){
	// plus 24, valeur arbitraire pour tenir compte des marges autour du document
	height = $("#iframe").contents().find("body").outerHeight() + 24;
	$("iframe").css("height", height);
	$("#iframe_holder").css("height", height + 24);
});

/* ]]> */
</script>