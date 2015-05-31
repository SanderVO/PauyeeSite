$(document).ready(function() {
    // init CK's
    var count = $(".client-blocks > div").length;
    for(var i=1;i<=count;i++)
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
        "");
        // if picture
        if(type == 'picture') {
            $(".client-blocks").append(""+
                "<label for='block-picture'>Foto</label>" +
                "<input type='file' name=\"block_picture_" + count + "\" id=\"block_picture_" + count + "\">" +
                "<label for='block-picture_pos'>Positie Foto</label>" +
                "<select form='client-form' name=\"block[" + count + "][\'picture_pos\']\" id=\"block[" + count + "][\'picture_pos\']\">" +
                    "<option value='left'>Links</option>" +
                    "<option value='right'>Rechts</option>" +
                "</select>" +
            "");
        }
        // last
        $(".client-blocks").append("" +
                "<input type='hidden' value='" + type + "' name=\"block[" + count + "][\'type\']\" id=\"block[" + count + "][\'type\']\">" +
            "</div>" +
            "<hr>" +
        "");
        // init CK
        CKEDITOR.replace("block[" + count + "][\'text\']");
    })
    .fail(function() {
        console.log("error");
    }); 
}