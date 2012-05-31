<?php include_partial('statistics/header', array('campaign' => $campaign)); ?>

<div class="tabbable">
  <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>

	<ul class="nav nav-tabs">
		<?php
		printf('<li><a href="%s">Vue d\'ensemble</a></li>', url_for('@campaign_statistics_summary?slug='.$campaign->getSlug()));
		printf('<li><a href="%s">Cibles</a></li>', url_for('@campaign_statistics_targets?slug='.$campaign->getSlug()));
		printf('<li><a href="%s">Ouvertures</a></li>', url_for('@campaign_statistics_views?slug='.$campaign->getSlug()));
		printf('<li><a href="%s">Clicks</a></li>', url_for('@campaign_statistics_show_links?slug='.$campaign->getSlug()));
		echo '<li><a href="#2" data-toggle="tab">D&eacute;sinscriptions</a></li><li><a href="#3" data-toggle="tab">Erreurs</a></li>';
		printf('<li><a href="%s">Configuration des destinataires</a></li>', url_for('@campaign_statistics_show_browser?slug='.$campaign->getSlug()));
		echo '<li class="active"><a href="#1" data-toggle="tab"> Message</a></li>';
		?>
	</ul>

		<div class="tab-content">

    	<div class="tab-pane active" id="1">
    		<form class="form form-horizontal">
           <div class="control-group">
	            <label class="control-label"><?php echo __('De') ?></label>
	            <div class="controls">
	              <?php printf('<span class="uneditable-input" style="width: 100%%">%s &lt;%s&gt;</span>', $campaign->getFromName(), $campaign->getFromEmail()) ?>
	            </div>
            </div>

           <div class="control-group">
	            <label class="control-label"><?php echo __('Répondre à') ?></label>
	            <div class="controls">
	              <span class="uneditable-input" style="width: 100%"><?php echo $campaign->getReplyToEmail() ?></span>
	            </div>
            </div>

						<div class="control-group">
	            <label class="control-label"><?php echo __('Sujet') ?></label>
	            <div class="controls">
	              <span class="uneditable-input" style="width: 100%"><?php echo $campaign->getSubject() ?></span>
	            </div>
            </div>

           	<div class="control-group">
	            <label class="control-label"><?php echo __('Corps') ?></label>
	            <div class="controls">
	              <span class="uneditable-input" id="iframe_holder" style="width: 100%">
	              	<iframe id="iframe" style="border: none;" name="frame_Liks" src="<?php echo url_for('@campaign_statistics_display_message_iframe?slug='.$campaign->getSlug()) ?>" scrolling="auto" height="720" width="1020" frameborder="1"></iframe>
								</span>
	            </div>
            </div>
				</form>
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