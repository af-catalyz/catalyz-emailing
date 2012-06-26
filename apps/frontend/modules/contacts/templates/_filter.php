<form>
    <div class="well">
<?php

$filters = ContactPeer::getFiltersData();
$customFields_dispos = CatalyzEmailing::getCustomFields();
$sf_user = sfContext::getInstance()->getUser();
// $filters['campaigns'] = array();
// $filters['groups'] = array();
?>





				<?php
$custom = '';
if (!empty($customFields_dispos)) {
    $custom = ', ' . implode(', ', $customFields_dispos);
}

?>
<label>Recherche dans les contacts <a href="javascript://" class="" rel="popover" title="La recherche sera effectuée dans tous les champs des contacts (Prénom, Nom, Société, Email<?php echo $custom ?>). "><i class="icon-question-sign"></i></a></label>

<div class="controls">
	<div class="input-append">
		<input id="searchInput" name="searchInput" class="span2" type="text" size="16" <?php $sf_user->hasAttribute('Keywords', false)?printf('value="%s"', $sf_user->getAttribute('Keywords')):printf('placeholder="Indiquer le texte cherché ici"'); ?> /><a href="javascript://" id="cleanSearchInput" class="btn" style="margin-top: -9px;"><u class="icon-remove"></u></a>
	</div>
</div>


<?php
//region campaigns
if (!empty($filters['campaigns'])) {
    echo '<div id="status_holder"><ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>';
    printf('<label class="checkbox"><input id="statutCheckbox%1$s" class="statut" type="checkbox" value="%1$s" name="statutCheckbox[%1$s]"' , Contact::STATUS_NEW);
    if (!$sf_user->hasAttribute('Statuts') || in_array(Contact::STATUS_NEW, $sf_user->getAttribute('Statuts'))) {
        echo 'checked="checked"';
    }
    printf('/><u class="icon-ok"></u> Actifs</label>');

    printf('<label class="checkbox"><input id="statutCheckbox%1$s" class="statut" type="checkbox" value="%1$s" name="statutCheckbox[%1$s]"' , Contact::STATUS_BOUNCED);
    if (!$sf_user->hasAttribute('Statuts') || in_array(Contact::STATUS_BOUNCED, $sf_user->getAttribute('Statuts'))) {
        echo 'checked="checked"';
    }
    printf('/><u class="icon-remove"></u> En erreur suite à</label>');

    printf('<select class="campaign_selector" id="statutCheckbox_campaignIdBounced" name="statutCheckbox[campaignIdBounced]"><option value="null">n\'importe quelle campagne</option>');
    foreach ($filters['campaigns'] as $campaignId => $campaignLabel) {
				printf('<option%s value="%s">%s</option>', $campaignId==$sf_user->getAttribute('campaignIdBounced')?' selected="selected"':'',$campaignId, $campaignLabel);
    }
    echo '</select>';

    printf('<label class="checkbox"><input id="statutCheckbox%1$s" class="statut" type="checkbox" value="%1$s" name="statutCheckbox[%1$s]"' , Contact::STATUS_UNSUBSCRIBED);
    if (!$sf_user->hasAttribute('Statuts') || in_array(Contact::STATUS_UNSUBSCRIBED, $sf_user->getAttribute('Statuts'))) {
        echo 'checked="checked"';
    }
    printf('/><u class="icon-off"></u> Désinscrits suite à</label>');

    printf('<select class="campaign_selector" id="statutCheckbox_campaignIdUnsubscribed" name="statutCheckbox[campaignIdUnsubscribed]"><option value="null">n\'importe quelle campagne</option>');
    foreach ($filters['campaigns'] as $campaignId => $campaignLabel) {
        printf('<option%s value="%s">%s</option>', $campaignId==$sf_user->getAttribute('campaignIdUnsubscribed')?' selected="selected"':'', $campaignId, $campaignLabel);
    }
    echo '</select>';
	echo '</div>';
}
//endregion

//region groups
if (!empty($filters['groups'])) {
		echo '<input id="groupCheckbox0" class="group" type="checkbox" value="null" name="groupCheckbox[]" checked="checked" style="display:none"/>';// permet la selection de RIEN
    printf('<ul class="nav nav-list" style="padding: 8px 0pt;"><li class="divider"></li></ul>
<label>%s (<a class="checkAllNone" rel="1" href="javascript://">%s</a> / <a class="checkAllNone" rel="0" href="javascript://">%s</a>)</label><div id="groups_holder">', __('Groupes'), __('tous'), __('aucun'));
    foreach ($filters['groups'] as $groupId => $groupLabel) {
        printf('<label class="checkbox"><input id="groupCheckbox%1$s" class="group" type="checkbox" value="%1$s" name="groupCheckbox[]"', $groupId);
        if (!$sf_user->hasAttribute('Groups') || in_array($groupId, $sf_user->getAttribute('Groups'))) {
            echo 'checked="checked"';
        }
        printf('/> %s</label>', $groupLabel);
    }
    echo '</div>';
}
//endregion
?>

      </div>
    </form>

<?php use_javascript('/js/chain-min.js') ?>
    <script type="text/javascript">
    /* <![CDATA[ */



function executeAjax(){
	if(typeof(x)!='undefined' && typeof(x)!='boolean'){ 	x.abort(); 	}
	//defer(5500).thenRun(sendAjax);
	sendAjax();
}

function sendAjax(){
//	var groups_parameter = '';
//	var status_parameter = '';
//
//	if ($("#groups_holder :checkbox:visible").length > 0) {
//		groups = '';
//		$("#groups_holder :checkbox:checked").each(function(index) {
//			groups += $(this).val()+',';
//		});
//
//		alert($('#statutCheckbox_campaignIdUnsubscribed option:selected').val());
//
//		groups_parameter = '&groupCheckbox=' +groups;
//	}
//
//
//	if ($("#status_holder :checkbox:visible").length > 0) {
//		status = '';
//		$("#status_holder :checkbox:checked").each(function(index) {
//			status += $(this).val()+',';
//		});
//
//		status_parameter = '&statutCheckbox=' +status;
//
////		alert(status_parameter);
////		return false;
//	}


	$("#wait").show();
	if(typeof(x)!='undefined'){ 	x.abort(); 	}
	x = $.ajax({
		type: "POST",
		url: "<?php echo url_for('@contact_do_ajax_sort_contact_list') ?>",
		data:  $('form').serialize(),
		//data:  'searchInput='+ $("#searchInput").val()+groups_parameter ,
		success: function(html) {
			$("#wait").hide();
			$("#contact_list_holder").empty();
			$("#contact_list_holder").append(html);
		}
	});
}

//déclencheurs
$("#searchInput").live("keyup", function(){
	executeAjax();
});

$("#cleanSearchInput").live("click", function(){
	$("#searchInput").val('');
	executeAjax();
});

$(".checkAllNone").live("click", function(){
	bool = false;
	if ($(this).attr('rel') == '1') {
		bool = true;
	}

	$("#groups_holder").find(':checkbox').attr('checked', bool);
	executeAjax();
});

$(".group").live("change", function(){
	executeAjax();
});

$(".statut").live("change", function(){
	executeAjax();
});

$(".campaign_selector").live("change", function(){
	executeAjax();
});


$(document).ready(function() {
//	sendAjax();
});



    /* ]]> */
    </script>
