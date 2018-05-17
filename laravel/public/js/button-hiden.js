$('.form-disable').on('submit' , function(){

	var self = ($this),
		button = self.find('input[type="submit"] , button');

		button.attr('disabled','disabled').var('Disetujui');

		return false;

});


