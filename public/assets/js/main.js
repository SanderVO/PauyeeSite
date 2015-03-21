$(document).ready(function() {

	$('#home-slider').slideme({
		arrows: true,
		touch : true,
		swipe : true,
		labels : {
			next: 'next',
			prev: 'prev'
		},
		resizable: {
			width: 990,
			height: 450,
		}
	});

	// CKEDITOR
	if($('#about-editor').html() != undefined)
		CKEDITOR.replace('about-editor');
	if($('#client-desc-editor').html() != undefined)
		CKEDITOR.replace('client-desc-editor');
	if($('#client-text-editor').html() != undefined)
		CKEDITOR.replace('client-text-editor');

});