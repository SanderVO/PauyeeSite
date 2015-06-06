$(document).ready(function() {
    // init CK's
    var count = $(".client-blocks > div").length;
    for(var i=0;i<=count;i++)
        CKEDITOR.replace("block[" + i + "][\'text\']");
});

function newBlock(type) {
    // request
    $.ajax({
        url: '/api/blocks/clients/' + type,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) {
        // count divs
        var count = $(".client-blocks > div").length;
        count++;
        // append
        $(".client-blocks").append("<div class='form-group'>" +
                "<label for='block-text'>Block Tekst</label>" +
                "<textarea class='form-control' id=\"block[" + count + "][\'text\']\" name=\"block[" + count + "][\'text\']\"></textarea>" +
            "</div>" +
        "");
        // if picture
        if(type == 'picture') {
            $(".client-blocks").append(""+
                "<div>Foto</div>" +
                "<img class='col-md-4' src='#' id='bpic" + count + "' />" +
                "<input class='block-pic' type='file' name=\"block_picture_" + count + "\" id=\"block_picture_" + count + "\">" +
                "<div>Positie Foto</div>" +
                "<select form='client-form' name=\"block[" + count + "][\'picture_pos\']\" id=\"block[" + count + "][\'picture_pos\']\">" +
                    "<option value='left'>Links</option>" +
                    "<option value='right'>Rechts</option>" +
                "</select>" +
            "");
        }
        // last
        $(".client-blocks").append("" +
            "<input type='hidden' value='" + type + "' name=\"block[" + count + "][\'type\']\" id=\"block[" + count + "][\'type\']\">" +
            "<hr>" +
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

function readURL(input, id) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}