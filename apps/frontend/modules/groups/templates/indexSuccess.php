<div class="tabbable">
<ul class="nav nav-tabs">
	<li><a href="<?php echo '/index.php/contacts' ?>" data-toggle="tab">Contacts</a></li>
	<li class="active"><a href="#2" data-toggle="tab">Groupes</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="2">
		<div class="span2"></div>
	</div>
</div>

<script type="text/javascript">
/* <![CDATA[ */

$(function(){
	// Function to activate the tab
	function activateTab() {
		var activeTab = $('[href=' + window.location.hash.replace('/', '') + ']');
		activeTab && activeTab.tab('show');
	}

	// Trigger when the page loads
	activateTab();

	// Trigger when the hash changes (forward / back)
	$(window).hashchange(function(e) {
		activateTab();
	});

	// Change hash when a tab changes
	$('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown', function () {
		window.location.hash = '/' + $(this).attr('href').replace('#', '');
	});
});

/* ]]> */
</script>