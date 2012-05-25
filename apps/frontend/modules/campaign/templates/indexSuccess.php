    <?php include_partial('campaign/header',array('campaign' => $campaign)) ?>

    <div class="tab-content">
	    <div class="tab-pane active" id="1">
	    	<?php include_component('campaign', 'enveloppe',array('campaign' => $campaign)) ?>
	    </div>
	    <div class="tab-pane" id="2">
				<?php include_component('campaign', 'message',array('campaign' => $campaign)) ?>
	    </div>
	    <div class="tab-pane" id="3">
	    	<?php include_component('campaign', 'links',array('campaign' => $campaign)) ?>
			</div>

			<div class="tab-pane" id="5">
				<?php include_component('campaign', 'antiSpam',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="6">
				<?php include_component('campaign', 'visualControls',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="7">
				<?php include_component('campaign', 'targets',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="8">
				<?php include_component('campaign', 'returnErrors',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="9">
				<?php include_component('campaign', 'scheduling',array('campaign' => $campaign)) ?>
			</div>
    </div>
    </div>

