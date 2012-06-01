<h2>Ajouter à la liste des destinataires, des contacts de votre base de données</h2>
<?php echo form_tag('@campaign-target-add-provider?slug='.$campaign->getSlug().'&provider='.$providerName, array('class'=>'form-horizontal', 'method' => 'POST')) ?>
<p>Saisissez dans le champ suivant quelques lettres correspondant aux contacts que vous souhaitez ajouter,<br /> une recherche sera effectuée dans la base de données et les 15 premiers contacts correspondants <br />seront affichés pour vous permettre de les sélectionner.</p>

  <div class="row">
    <div class="span5">
    	<h3>Recherche</h3>


			<div class="control-group">
			  <label class="control-label">Rechercher :</label>
			  <div class="controls">
			    <div class="input-append">
						<?php
	$widget = new sfWidgetFormInput(array(), array('class' => 'span3', 'size' => 16, 'id' => 'ajaxInput'));
echo $widget->render('ajaxInput');
?><button type="button" class="btn newSearch">&times;</button>
			    </div>
			  </div>
			</div>

			 <div id="item_suggestion" style="margin-top:10px;"></div>


		</div>
    <div class="span5" id="right">
    	<h3>Contacts à ajouter</h3>
    	<div id="item_suggestion2"></div>
    	<input class="btn btn-primary" type="submit" name="Add" value="Ajouter ces contacts" />
		</div>
  </div>
</form>


<script type="text/javascript">

$("#ajaxInput").live("keyup", function(){
	if ($('#ajaxInput').val().length >= 2){
		$('#ajaxInput').addClass('ac_loading');

		if(typeof(x)!='undefined'){ 	x.abort(); 	}

		x = $.ajax({
			type: "POST",
			url: "<?php echo url_for('@ajax') ?>",
			data:  'q='+ $("#ajaxInput").val()+'&id=<?php echo $campaign->getId(); ?>',
			success: function(html) {
				$("#item_suggestion").empty();
				$("#item_suggestion").append(html);
				$('#ajaxInput').removeClass('ac_loading');
			}
		});
	}
});

$('.newSearch').click(function() {
  if(typeof(x)!='undefined'){ 	x.abort(); 	}
  x = $.ajax({
    type: "POST",
    url: "<?php echo url_for('@ajax') ?>",
    data:  'q= "" &id=<?php echo $campaign->getId(); ?>',
    success: function(html) {
		$("#item_suggestion").empty();
	    $("#item_suggestion").append(html);
	    $('#ajaxInput').removeClass('ac_loading');
	  	}
	});

  $('#ajaxInput').val('');
  $('#ajaxInput').focus();
});
</script>

