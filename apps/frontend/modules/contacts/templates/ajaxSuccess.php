<?php
foreach ($authors as $k => $author){
	printf('<label class="checkbox"><input type="checkbox" class="ajaxCheckbox" name="contacts[]" id="checkboxAjax%d" value="%s"/>%s</label>', $k, $k, $author);
}
?>

<script type="text/javascript">
 var selected = '';


$("#item_suggestion :checkbox").click(function() {
	$("#right").show();
	$('#ajaxInput').addClass('ac_loading');
	$(this).parent().clone().appendTo('#item_suggestion2');
	$("#item_suggestion2 input:checked").each(
	function(){
		if($(this).val()>0){
			selected = selected + ',' + $(this).val()
		}
	}
	);

	if(typeof(x)!='undefined'){ 	x.abort(); 	}
	x = $.ajax({
		type: "POST",
		url: "<?php echo url_for('@ajax') ?>",
		data:  'q='+ $("#ajaxInput").val()+'&id=<?php echo $campaignId?> &selected='+ selected,
		success: function(html) {
			$("#item_suggestion").empty();
			$("#item_suggestion").append(html);
			$('#ajaxInput').removeClass('ac_loading');
		}
	});
});

</script>