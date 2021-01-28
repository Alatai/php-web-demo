"use strict";

$(function () {
    // nav user control panel
    $(".last").mouseover(function () {
        $(this).children("ul").show();
    });

    $(".last").mouseout(function () {
        $(this).children("ul").hide();
    });
});

/**
 * Paging.
 */
function paging(currentPage) {
    console.log(currentPage);
    $("#currentPage").val(currentPage);
    $("#blogs").submit();
}