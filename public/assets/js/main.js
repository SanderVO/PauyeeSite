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
	if($('#edit-slider-description').html() != undefined)
		CKEDITOR.replace('edit-slider-description');

	// Link Active
    var url = window.location;
    $('.navbar a').find('.active').removeClass('active');
    $('.navbar a').each(function () {
        if (this.href == url) {
            $(this).addClass('active');
        }
    }); 

    /*
    * About Page
    */
    $("#edit-about-text").on('click', function(data) {
    	CKEDITOR.replace('about-text-editor');
    	$("#about-text-editor").show();
    	$(".about .about-text").hide();
    	// show/hide buttons
    	$("#save-about-text").show();
    	$("#cancel-about-text").show();
    	$("#edit-about-text").hide();
    });
    $("#cancel-about-text").on('click', function(data) {
    	$("#about-text-editor").hide();
    	$(".about .about-text").show();
    	CKEDITOR.instances['about-text-editor'].destroy();
    	// show/hide buttons
    	$("#save-about-text").hide();
    	$("#cancel-about-text").hide();
    	$("#edit-about-text").show();
    });
    $("#save-about-text").on('click', function(data) {
    	var text = CKEDITOR.instances['about-text-editor'].getData();
    	$.ajax({
    		url: 'api/about/edit/1',
    		method: 'PUT',
    		data: {'text': text, 'type': 'JSON'}
    	}).success(function(data, status, request) {
    		if(request.getResponseHeader('status-code') == 200) {
    			// all went well
    			$(".about .about-text").html(text);
    			// destroy CKEDITOR
		    	$("#about-text-editor").hide();
		    	$(".about .about-text").show();
    			CKEDITOR.instances['about-text-editor'].destroy();
    			// show/hide
		    	$("#save-about-text").hide();
		    	$("#cancel-about-text").hide();
		    	$("#edit-about-text").show();
    		} else {
    			console.log(data);
    		}
    	});
    });

});

/**
* Clients Page
*/
function searchClients() {
    // get
    var value = $("#search-client-text").val();
    // request
    $.ajax({
        url: '/clients/search/' + value,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) {
        console.log(data);
    })
    .fail(function() {
        console.log("error");
    });      
}