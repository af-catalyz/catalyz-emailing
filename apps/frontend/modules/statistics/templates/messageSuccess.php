<?php include_partial('statistics/header', array('campaign' => $campaign, 'other_campaigns' => $other_campaigns)); ?>

<div class="tabbable">
  <?php include_partial('statistics/menu', array('campaign' => $campaign)); ?>

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