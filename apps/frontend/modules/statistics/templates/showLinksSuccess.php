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
			<td>
				<?php printf('<div class="declenche-click-modal"><a class="btn btn-mini" data-toggle="modal" href="%s">%s</a></div>', url_for(sprintf('@campaign_statistics_show_clicks?id=%s',$details['id'])) , __('details')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
<?php printf('<a class="btn" href="%s"><i class="icon-download"></i> %s</a>', url_for('@campaign_statistics_do_export_clicks?slug='.$campaign->getSlug()), __('Télécharger la liste')) ?>
	</div>
	<?php endif ?>



			</div>
    </div>
</div>

<?php
	//region clics modal
	printf('<div class="modal fade" id="clickModal" style="display: none"><div class="modal-header"><a class="close" data-dismiss="modal">×</a><h3>%s</h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn btn-primary close_tag">%s</a></div></div>', __('Détail des clics'), __('Fermer'));
	//endregion
?>

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
		return false;
	});


	$('.modal-footer a.close_tag, .modal-header a').live('click',function(){
		$('.modal').modal('hide');
		$('.modal-backdrop').hide();
		return false;
	});

});

$(window).load(function(){
	// plus 40, valeur arbitraire pour tenir compte des marges autour du document
	height = $("#iframe").contents().find("body").outerHeight() + 40;
	$("iframe").css("height", height);
	$("#iframe_holder").css("height", height + 40);
});

/* ]]> */
</script>