$( document ).ready(function() {

    if(location.href.indexOf("admin/course")>-1) {
        var row = "";

        // trash btn
        $("[name='trash_btn']").on("click", function() { row  = $(this).parents("tr").attr("id"); });
        $("#trash_cancel_btn ").on("click", function() { row  = ""; });

        /*************************************
         *             new course            *
         *************************************/
        $("#new_apply_btn").on("click", function() {
            var empty_check = 1;
            $("#new_course_form input").each(function() {
                if(!$(this).val()) {
                    $(this).focus();
                    empty_check = 0;
                }
            });
            if(empty_check==1) {
                var year = $("input[name='year']").val();
                var name = $("input[name='name']").val();
                var link = $("input[name='link']").val();
                $.post(site_url+"/new_course", {year: year,name: name,link: link}, function(data) {
                    var obj = JSON && JSON.parse(data) || $.parseJSON(data);
                    if(obj.result.indexOf("Success")>-1) {
                        $("#course_list tr:nth-child(2)").before(
                            $("<tr>").attr("id", "c_"+obj.id)
                                .append( $("<td>").addClass("col-md-2").attr("name", "year_value").text(year) )
                                .append( $("<td>").addClass("col-md-3").attr("name", "name_value").text(name) )
                                .append( $("<td>").addClass("col-md-5").attr("name", "link_value").text(link) )
                                .append( $("<td>").addClass("col-md-2")
                                    .append(
                                        $("<button>")
                                            .addClass('btn btn-danger btn-md')
                                            .attr("data-toggle", "modal")
                                            .attr("data-target", "#trash_course_modal")
                                            .attr("name", "trash_btn")
                                            .html("<i class='fa fa-trash' aria-hidden='true'></i> Trash")
                                            .on("click", function() {
                                                row = $(this).parents("tr").attr("id");
                                            })
                                    ))
                            );
                        $("#new_course_form").trigger('reset');
                        $("#new_result_msg").html("<font color='green' size='3'>Success</font>");
                    } else {
                        $("#new_result_msg").html("<font color='red' size='3'>Failed</font>");
                    }
                })
                .fail(function() { $("#new_result_msg").html("<font color='red' size='3'>Failed</font>"); })
                .always(function() {
                    setTimeout(function() {
                        $("#new_result_msg").html("");
                        $("#new_course_modal").modal("hide");
                    }, 1500);
                });
            }
        });

        $("#trash_apply_btn").on("click", function() {
            $.post(site_url+"/trash_course", {row: row }, function(data) {
                if(data.indexOf("Success")>-1) {
                    $("#trash_result_msg").html("<font color='green' size='3'>Success</font>");
                    $("#"+row).fadeOut('slow', function() { $("#"+row).remove(); });
                    row = "";
                } else {
                    $("#trash_result_msg").html("<font color='red' size='3'>Failed</font>");
                }
            })
            .fail(function() { $("#trash_result_msg").html("<font color='red' size='3'>Failed</font>"); })
            .always(function() {
                setTimeout(function() {
                    $("#trash_result_msg").html("");
                    $("#trash_course_modal").modal("hide");
                }, 1500);
            });
        });
    } // end of if(location.href)

});