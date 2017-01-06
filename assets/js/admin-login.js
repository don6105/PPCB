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

}); // end of document.ready