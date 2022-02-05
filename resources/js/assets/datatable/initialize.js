import * as $ from 'jquery';

import miDataTable from "./config";

$(document).ready(function() {
    miDataTable();
} );



$(".menu-toggle-btn").click(function () {
    //Destroy the old Datatable
    $('#miTabla').DataTable().destroy();

    miDataTable();
});
