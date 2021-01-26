"use strict";

/**
 * Paging.
 */
function paging(currentPage) {
    document.getElementById("currentPage").value = currentPage;
    document.forms[0].submit();
}