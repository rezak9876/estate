import * as $ from 'jquery';




$(document).ready(function() {
    $(".menu-toggle-btn").click(function() {
        $("#wrapper").toggleClass('menuDisplayed');
        $("#sidebar-wrapper").toggleClass('d-none');
        $("#hamburger-icon").toggleClass('d-none');
    });
});