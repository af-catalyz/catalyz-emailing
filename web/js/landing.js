function czEmailingLandingAction(form, url){
	$.ajax({
		url: url,
		type:"POST",
		dataType : 'text',
		data: form.serialize()
	}).done(function(data) {
		if(data != ''){
			alert(data);
		}
	});
}