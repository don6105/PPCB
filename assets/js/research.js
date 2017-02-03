$( document ).ready(function() {

    $(".paper-group").css("cursor", "pointer").on("click", function() {
        $("#paper_modal").modal("toggle");
    });
    $(".thumbnail-box img").on("click", function() {
        var effect_speed = 300;
        var clicked_obj = $(this);
        if($(".display-img").attr("src")!==clicked_obj.attr("src")) {
            $(".display-img").fadeOut(effect_speed, function() {
                $(".display-img").attr("src", clicked_obj.attr("src") );
                $(".display-img").fadeIn(effect_speed);
            });
        }
    });

});