function czEmailingLandingAction(form, url){
	var isValid = true;
	form.find('input[type="text"]').each(function (){
		if($(this).val().replace(/^\s+/g,'').replace(/\s+$/g,'') == ''){
			alert('Merci de renseigner tous les champs du formulaire');
			$(this).focus();
			isValid = false;
			return false;
		}
	});
	if(isValid){
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
}