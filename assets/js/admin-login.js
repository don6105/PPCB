$(document).ready(function() {
    $("#login-btn").on("click", function() {
        var empty_check = 1;
        $("#login_form input").each(function() {
            if (this.value === '') {
                this.focus();
                empty_check = 0;
                return false;
            }
        });
        if(empty_check==1) {
            $("#login_msg").html("");
            $.post(site_url+"/login", {usermail: $("#usermail").val(), password: $("#password").val()}, function(data) {
                var obj = JSON && JSON.parse(data) || $.parseJSON(data);
                if(obj.result.indexOf("Success")>-1) {
                    location.replace( obj.redirect );
                } else {
                    $("#login_msg")
                        .hide()
                        .text("Failed.")
                        .css("color", "red")
                        .css("font-size", "18px")
                        .css("position", "relative")
                        .css("top", "10px")
                        .addClass("text-center")
                        .fadeIn(1200);
                    $("#password").val("");
                }
            }).fail(function() {
                $("#login_msg")
                    .hide()
                    .text("Network Error.")
                    .css("color", "red")
                    .css("font-size", "18px")
                    .css("position", "relative")
                    .css("top", "10px")
                    .addClass("text-center")
                    .fadeIn(1200);
            });
        }
    });

    $("#logout_link").on("click", function() {
        $.post(site_url+"/logout", {}, function(data) {
            var obj = JSON && JSON.parse(data) || $.parseJSON(data);
            location.replace( obj.redirect );
        });
    });

    // change passwd
    $("#personal_pwd_apply_btn").on("click", function() {
        if( $("#change_pwd1").val()!="" && $("#change_pwd1").val()==$("#change_pwd2").val()) {
            $.post(site_url+"/change_pwd", {row: "self", pwd: $("#change_pwd1").val() }, function(data) {
                if(data.indexOf("Success")>-1) {
                    $("#personal_pwd_result_msg").html("<font color='green' size='3'>Success</font>");
                    row  = "";
                    name = "";
                } else {
                    $("#personal_pwd_result_msg").html("<font color='red' size='3'>Failed</font>");
                }
            })
            .fail(function() { $("#personal_pwd_result_msg").html("<font color='red' size='3'>Failed</font>"); })
            .always(function() {
                setTimeout(function() {
                    $("#personal_pwd_result_msg").html("");
                    $("#personal_pwd_form").trigger('reset');
                    $("#personal_pwd_modal").modal("hide");
                }, 1500);
            });
        } else {
            $("#personal_pwd_result_msg").html("<font color='red' size='3'>Password aren't matched</font>");
            setTimeout(function() {
                $("#personal_pwd_result_msg").html("");
                $("#personal_pwd_form").trigger('reset');
            }, 1500);
        }

    });

}); // end of document.ready