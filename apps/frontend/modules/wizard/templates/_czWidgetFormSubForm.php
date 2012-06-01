<?php $id = 'czWidgetFormSubForm' . rand(0, 999999999); ?>
<?php $i18n = sfContext::getInstance()->getI18N(); ?>

<div id="fieldset_<?php echo $id ?>" style="margin:3px 0 10px 0;clear:both;background-color: #EEEEEE; border: 1px solid #DDDDDD;">
	<div style="padding: 5px;">
		<a  class="show_<?php echo $form_id ?>" style="text-decoration:none;"
		id="<?php echo $id ?>_show"href="#<?php echo $id ?>_fieldset">
		<i class="icon-plus-sign"></i>
		</a>&nbsp;
		<span class="title" id="<?php echo $id ?>_title"><?php echo $Name ?></span>

			<a href="#" onclick="$('#<?php echo $id; ?>').fadeOut('slow', function (){$('#fieldset_<?php echo $id; ?>').remove();});  return false;" class="close" >&times;</a>

	</div>
	<div style="clear: both;"></div>
	<div id="<?php echo $id ?>" >
		<div class="elements_<?php echo $form_id ?>" id="element_<?php echo $id ?>" style="clear:both;display:none;padding: 10px 0; background-color: #FFFFFF;">
			<table border="0" cellpadding="2" cellspacing="0" class="subform" width="99%">
			<?php echo $form; ?>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
<?php if ( isset($selectedField) &&  $selectedField):
	if (isset($list) && $list) : ?>
	$('#<?php echo $selectedField; ?>').live('change', function() {
	  $('#<?php echo $id ?>_title').empty();
	  $('#<?php echo $id ?>_title').append($('#<?php echo $selectedField; ?> option:selected').text());
	});
	<?php  else:?>
	$('#<?php echo $selectedField; ?>').live('change', function() {
	  $('#<?php echo $id ?>_title').empty();
	  $('#<?php echo $id ?>_title').append($('#<?php echo $selectedField; ?>').val());

	});
	<?php endif?>
<?php endif?>



<?php
printf('
$("#%1$s_show").click(function() {
  $("#element_%1$s").slideToggle();
  if ($("#%1$s_show").children().attr(\'class\') == "icon-plus-sign")
  {	$("#%1$s_show").children().attr(\'class\',"icon-minus-sign"); }
  else
  {	$("#%1$s_show").children().attr(\'class\',"icon-plus-sign"); }
}); ', $id);

if($sf_request->isXmlHttpRequest()){
printf('
  $("#element_%1$s").slideToggle();
  if ($("#%1$s_show").children().attr(\'class\') == "icon-plus-sign")
  {	$("#%1$s_show").children().attr(\'class\',"icon-minus-sign"); }
  else
  {	$("#%1$s_show").children().attr(\'class\',"icon-plus-sign"); }
 ', $id);
printf('
$("#ContentObject_ExpandCollapse_items_%1$s_title").keyup(function() {
	$("#%2$s_title").html($(this).val());
});

', $form_id, $id);
}

?>
</script>