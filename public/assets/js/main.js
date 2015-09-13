$(document).ready(function() {

	$('#home-slider').slideme({
		arrows: true,
		touch: true,
		swipe: true,
        css3: true,
        autoSlide: true,
        autoslideHoverStop: true,
        interval: 2000,
        loop: true,
		labels : {
			next: '<i class="fa fa-arrow-right fa-2x"></i>',
			prev: '<i class="fa fa-arrow-left fa-2x"></i>'
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
    if($('.home-insta-pics').html() != undefined)
        getInstaPics();

    // init CK's
    if($(".client-blocks").html() != undefined) {
        var count = $(".client-blocks textarea").length;
        for(var i=1;i<=count;i++)
            CKEDITOR.replace("block[" + i + "][\'text\']");
    }
    if($(".blog-blocks").html() != undefined) {
        var count = $(".blog-blocks textarea").length;
        console.log(count);
        for(var i=0;i<=count;i++)
            CKEDITOR.replace("block[" + i + "][\'text\']");
    }

	// Link Active
    var url = window.location;
    $('.navbar a').find('.active').removeClass('active');
    $('.navbar a').each(function () {
        if (this.href == url) {
            $(this).addClass('active');
        }
    }); 

    /*
    * Global
    */
    if($("#client-pic").html() != undefined) {
        $("#picture").change(function() {
            readURL(this, "#client-pic");
        });
    }
    if($("#blog-pic").html() != undefined) {
        $("#picture").change(function() {
            console.log('test');
            readURL(this, "#blog-pic");
        });
    }
    $(window).bind("scroll", function() {
        if(window.pageYOffset > 1) {
            $("nav").addClass('small');
            $("nav").removeClass('big');
        } else {
            $("nav").addClass('big');
            $("nav").removeClass('small');
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

/*
* Global
*/

function delBlock(id) {
    $(id).parent().remove();
}

// make new block
function newBlock(object, type) {
    // request
    $.ajax({
        url: '/api/blocks/' + object + '/' + type,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) {
        // count divs
        var count = $("." + object + "-blocks > div").length;
        count++;
        // append
        $("." + object + "-blocks").append("<div class='blog-block'><div class='form-group'>" +
                "<label for='block-text'>Block Tekst</label>" +
                "<textarea class='form-control' id=\"block[" + count + "][\'text\']\" name=\"block[" + count + "][\'text\']\"></textarea>" +
            "</div>" +
        "");
        // if picture
        if(type == 'picture') {
            $("." + object + "-blocks").append(""+
                "<div>Foto</div>" +
                "<img class='col-md-4 blocks-pic' src='#' id='bpic" + count + "' />" +
                "<input class='block-pic' type='file' name=\"block_picture_" + count + "\" id=\"block_picture_" + count + "\">" +
                "<div>Positie Foto</div>" +
                "<select form='" + object + "-form' name=\"block[" + count + "][\'picture_pos\']\" id=\"block[" + count + "][\'picture_pos\']\">" +
                    "<option value='left'>Links</option>" +
                    "<option value='right'>Rechts</option>" +
                "</select>" +
            "");
        }
        // last
        $("." + object + "-blocks").append("" +
            "<input type='hidden' value='" + type + "' name=\"block[" + count + "][\'type\']\" id=\"block[" + count + "][\'type\']\">" +
            "<input type='button' class='btn btn-primary' onclick='delBlock(this);' value='Verwijder'>" +
            "<hr></div>" +
        "");
        // init CK
        CKEDITOR.replace("block[" + count + "][\'text\']");
        // init listener
        $("#block_picture_" + count).change(function() {
            readURL(this, "#bpic" + count);
        });
    })
    .fail(function() {
        console.log("error");
    }); 
}

// read url and show image
function readURL(input, id) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

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

/**
* Blog page
**/
function showPosts(id) {
    if($(id).next().css('height') == '0px')
        $(id).next().css('height', 'auto');
    else
        $(id).next().css('height', '0px');
}

/**
* Home
**/
function getInstaPics() {
    // request
    $.ajax({
        url: 'https://api.instagram.com/v1/users/44021013/media/recent?client_id=9ebc396cee1b44aa8698ee87ae8067f7',
        type: 'GET',
        cache: false,
        dataType: 'jsonp'
    })
    .done(function(data) {
        console.log(data.data);
        var appString = '';
        for(var i = data.data.length - 1; i >= 0; i--) {
            appString += ''+
                '<div class="col-xs-6 col-sm-3 col-md-2 home-instagram-pic">'+
                    '<a href="'+data.data[i]["link"]+'"><img src="'+data.data[i]["images"]["thumbnail"]["url"]+'"></a>'+
                '</div>'+
            '';
        };
        $('.home-insta-pics').fadeIn().html(appString);
    })
    .fail(function() {
        console.log("error");
    });      
}