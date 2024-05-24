$(document).ready(function() {
    "use strict";

    function handleFocus() {
        $(this).attr("data-text", $(this).attr("placeholder"));
        $(this).attr("placeholder", "");
    }

    function handleBlur() {
        $(this).attr("placeholder", $(this).attr("data-text"));
    }

    // Hide placeholder on form focus
    $("[placeholder]").focus(handleFocus).blur(handleBlur);
});
