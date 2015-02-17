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
});