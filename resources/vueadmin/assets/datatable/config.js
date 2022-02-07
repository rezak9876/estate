import * as $ from 'jquery';

export default function  miDataTable(){
    $('#miTabla').DataTable({

        "language": {
            "emptyTable":			"<i>موردی یافت نشد.</i>",
            "info":		   		"نمایش _START_ تا _END_ از _TOTAL_ ",
            "infoEmpty":			"نمایش 0 داده از مجموع 0.",
            "infoFiltered":			"(از مجموع _MAX_ رکورد فیلتر شده)",
            // "infoPostFix":			"به روز شده",
            "lengthMenu":			"نمایش _MENU_ داده",
            "loadingRecords":		"در حال بارگذاری...",
            "processing":			"در حال پردازش...",
            "search":			"<span style='font-size:15px;'>جستجو:</span>",
            "searchPlaceholder":		"تایپ کنید..",
            "zeroRecords":			"برای جست و جو نتیجه ای یافت نشد.",
            "paginate": {
                "first":			"اولی",
                "last":				"آخری",
                "next":				"بعدی",
                "previous":			"قبلی"
            },
            "aria": {
                "sortAscending":	"صعودی",
                "sortDescending":	"نزولی"
            }
        },

        // "lengthMenu":		[[3,5,7, 10, 20, 25, 50, -1], [3,5,7, 10, 20, 25, 50, "Todos"]],
        // "iDisplayLength":	3,





    });
}
