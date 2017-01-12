$( document ).ready(function() {

    $(".paper-group").css("cursor", "pointer").on("click", function() {
        $("#paper_modal").modal("toggle");
    });
    $(".thumbnail-box img").on("click", function() {
        $(".display-img").attr("src", $(this).attr("src") );
    });

});