<?php

function renderSuccessFlash($message){
	printf('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>%s</div>', html_entity_decode($message));
	return TRUE;
}

function renderErrorFlash($message){
	printf('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a>%s</div>', html_entity_decode($message));
	return TRUE;
}
?>