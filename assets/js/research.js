$( document ).ready(function() {
    // toggle paper_modal
    $(".paper-group").css("cursor", "pointer").on("click", function() {
        var id = $(this).attr('id').split('r_')[1];
        $.post(site_url+"/get_research", {id: id}, function(data) {
            var obj = JSON && JSON.parse(data) || $.parseJSON(data);
            if(obj.result.indexOf('Success')>-1) {
                $("#display-box").html('');
                $('#info-content').html('');
                $('#thumbnail-box').html('');
                // paper information text
                $('#info-content').append(
                        $('<p>').html(obj.data.r_paper)
                    ).append(
                        $('<p>').html(obj.data.r_publicwhere+', '+obj.data.r_publicdate)
                    ).append(
                        $('<p>').html(obj.data.r_keyword)
                    ).append(
                        $('<p>').html(obj.data.r_description)
                    );
                // paper image thumnail
                if(obj.imgs.length>0) {
                    // set first as display-img
                    $("#display-box").append( $('<img>').attr("src", obj.imgs[0]).addClass('display-img') );
                    $.each(obj.imgs, function(index, item) {
                        // append imgs to thumbnail-img
                        $('.thumbnail-box').append(
                            $('<img>').attr('src', item).addClass('thumbnail-img')
                        );
                    });
                } else {
                    $("#display-box").append( $('<img>').attr("src", 'assets/img/PPCB/no-img.png').addClass('display-img') );
                }

                // switch showing img on modal
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
                $("#paper_modal").modal("show");
            }
        });
    });

});
