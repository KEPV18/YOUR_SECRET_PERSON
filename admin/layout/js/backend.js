$(function() {

    "use strict";

    // Hide placeholder on form focus
    $("[placeholder]").focus(function() {

        $(this).attr("data-text", $(this).attr("placeholder"));
        $(this).attr("placeholder", "");

    }).blur(function() { // لإعادة عرض النص عند فقدان التركيز
        $(this).attr("placeholder", $(this).attr("data-text"));
    });

});