jQuery(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $('select').select2();
    
    /*   $("#myBtn").click(function (e) {
        e.preventDefault();
        $(".modal, .modal-content").show();
        $(".modal").animate({ opacity: ".5" });
        $(".modal-content").animate({ opacity: "1" }, 350);
    });

    $("#myBtnE").click(function (e) {
        e.preventDefault();
        $(".modal, .modal-motif").show();
        $(".modal").animate({ opacity: ".5" });
        $(".modal-motif").animate({ opacity: "1" }, 350);
    });

    $('.close').click(function (e) {
        e.preventDefault();
        $('.modal, .modal-content').hide();
    }); */

    /*   $('.close-motif').click(function (e) {
        e.preventDefault();
        $('.modal, .modal-motif').hide();
    }); */

});
