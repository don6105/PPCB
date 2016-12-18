$( document ).ready(function() {

    var row = "", name = "";

    if(location.href.indexOf("admin/member")>-1) {

        // set Member Template default select value
        $("[name='hidden_permission']").each(function() {
            var permission_value = $(this).val();
            $(this).parent("td").find("[name='permission_value']").val(permission_value);
        });
        $("[name='hidden_edu_level']").each(function() {
            var edu_level_value = $(this).val();
            $(this).parent("td").find("[name='edu_level_value']").val(edu_level_value);
        });

        // unbind default submit action
        $("form").submit(function() { return false; })

        // Member List onchange function
        $("tr").hover( function() {
            $(this).attr("data-container", "body")
                   .attr("data-toggle", "tooltip")
                   .attr("data-placement", "left")
                   .attr("data-title", "<h4>press Enter to save</h4>")
                   .tooltip( {html:true} );
        }, function(){
            $(this).removeAttr("data-container")
                   .removeAttr("data-toggle")
                   .removeAttr("data-placement")
                   .removeAttr("data-original-title");
        });

        // New member data
        $("#new_apply_btn").on("click", function() {
            var empty_check = 1;
            $("#new_member_form input").each(function() {
                if(!$(this).val()) {
                    $(this).focus();
                    empty_check = 0;
                }
            });

            // if(empty_check==1 {
            if(true) {
                var formData = new FormData( $("#new_member_form")[0] );
                $.ajax({
                    url : site_url+"/new_member",  // Controller URL
                    type : 'POST',
                    data : formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(data) {
                        var obj = JSON && JSON.parse(data) || $.parseJSON(data);
                        if(obj.result.indexOf("Failed")>-1) {
                            $("#new_result_msg").html("<font color='red' size='3'>Failed</font>");
                        }
                        else {
                            $("#new_result_msg").html("<font color='green' size='3'>Success</font>");
                            $("#member_list").append(
                                $("<tr>")
                                    .attr("id", "m_"+obj.id)
                                    .append(
                                        $("<td>").addClass('col-md-2').append(
                                            $("<img>").attr("src", "../../"+obj.img).addClass('member-img')
                                            )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-2').attr("name", "name_value").text( $("[name='name_en']").val()+" ("+$("[name='name']").val()+")" )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-4').attr("name", "mail_value").text( $("[name='mail']").val() )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-1').append(
                                            $("<select>").addClass("form-control").attr("name", "edu_level_value")
                                                .append( $("<option>").val("Adviser").text("Adviser") )
                                                .append( $("<option>").val("Doctoral").text("Doctoral") )
                                                .append( $("<option>").val("Master").text("Master") )
                                                .val( $("[name='edu_level']").val() )
                                            )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-1').attr("name", "edu_year_value").text( $("[name='edu_year']").val() )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-1').append(
                                            $("<select>")
                                                .addClass("form-control")
                                                .attr("name", "permission_value")
                                                .append( $("<option>").val("admin").text("Admin") )
                                                .append( $("<option>").val("normal").text("Normal") )
                                                .val( $("[name='permission']").val() )
                                            )
                                        )
                                    .append(
                                        $("<td>").addClass('col-md-1').append(
                                            $("<button>")
                                                .addClass('btn btn-danger btn-md')
                                                .attr("data-toggle", "modal")
                                                .attr("data-target", "#trash_member_modal")
                                                .attr("name", "trash_btn")
                                                .html("<i class='fa fa-trash' aria-hidden='true'></i> Trash")
                                                .on("click", function() {
                                                    row = $(this).parents("tr").attr("id");
                                                })
                                            ).append(
                                                $("<button>")
                                                    .addClass('btn btn-primary btn-md')
                                                    .attr("data-toggle", "modal")
                                                    .attr("data-target", "#pwd_modal")
                                                    .attr("name", "pwd_btn")
                                                    .html("<i class='fa fa-key' aria-hidden='true'></i> Pwd")
                                                    .on("click", function() {
                                                        row = $(this).parents("tr").attr("id");
                                                    })
                                            )
                                        )
                                );
                                $("#new_member_form").trigger('reset');
                        }
                    },
                    error: function() {
                        $("#result_msg").html("<font color='red' size='3'>Failed</font>");
                    },
                    complete: function() {
                       setTimeout(function() {
                            $("#new_result_msg").html("");
                            $("#new_member_modal").modal("hide");
                        }, 1500);
                    }
                });
            }
        });

        // Member List onchange function
        $("#member_list td").on("keydown", function(e) {
            if(e.keyCode == 13) {
                // keyCode of Enter is 13
                e.preventDefault();
                var row = $(this).parent("tr").attr("id");
                member_list_change(row);
            }
        });
        $("[name='edu_level_value'], [name='permission_value']").on("change", function() {
            var row = this.parentElement.parentElement.id;
            member_list_change(row);
        });


        function member_list_change(row) {
            $row           = $("#"+row);
            var id         = $row.attr("id");
            var name_tmp   = $row.find("[name='name_value']").text().trim();
            var name       = name_tmp.split("(")[1].split(")")[0].trim();
            var name_en    = name_tmp.split("(")[0].trim();
            var mail       = $row.find("[name='mail_value']").text().trim();
            var level      = $row.find("[name='edu_level_value']").val();
            var year       = $row.find("[name='edu_year_value']").text().trim();
            var permission = $row.find("[name='permission_value']").val();

            if( typeof site_url !== "undefined" ) {
                $.post( site_url+"/mod_member", {id: id, name: name, name_en: name_en, mail: mail, level: level, year: year, permission: permission}, function(data) {
                    if(data.indexOf("Success")>-1) {
                        $row.addClass('success');
                        setTimeout(function() {
                            $row.removeClass('success');
                        }, 1500);
                    }
                    else {
                        $row.addClass('danger');
                        setTimeout(function() {
                            $row.removeClass('danger');
                        }, 1500);
                    }
                })
                .fail(function() {
                    $row.addClass('danger');
                    setTimeout(function() {
                        $row.removeClass('danger');
                    }, 1500);
                });
            }
            else {
                alert("JavaScript Error.\n\nPlease contact to us by email: don0910129285@gmail.com.");
            }
        } // end of member_list_change

        $("[name='trash_btn'], [name='pwd_btn']").on("click", function() {
            row  = $(this).parents("tr").attr("id");
            name = $("#"+row+" [name='name_value']").text().trim();
            $("#pwd_username").text(name);
        });

        $("#trash_cancel_btn, #pwd_cancel_btn").on("click" , function() {
            row  = "";
            name = "";
        });

        $("#trash_apply_btn").on("click", function() {
            $.post(site_url+"/trash_member", {row: row }, function(data) {
                if(data.indexOf("Success")>-1) {
                    $("#trash_result_msg").html("<font color='green' size='3'>Success</font>");
                    $("#"+row).fadeOut('slow', function() {
                        $("#"+row).remove();
                    });
                }
                else {
                    $("#trash_result_msg").html("<font color='red' size='3'>Failed</font>");
                }
            })
            .fail(function() {
                $("#trash_result_msg").html("<font color='red' size='3'>Failed</font>");
            })
            .always(function() {
                setTimeout(function() {
                    $("#trash_result_msg").html("");
                    $("#trash_member_modal").modal("hide");
                }, 1500);
            });
        });

        $("#pwd_apply_btn").on("click", function() {
            $.post(site_url+"/change_pwd", {row: row, pwd: $("#change_pwd").val() }, function(data) {
                if(data.indexOf("Success")>-1) {
                    $("#pwd_result_msg").html("<font color='green' size='3'>Success</font>");
                }
                else {
                    $("#pwd_result_msg").html("<font color='red' size='3'>Failed</font>");
                }
            })
            .fail(function() {
                $("#pwd_result_msg").html("<font color='red' size='3'>Failed</font>");
            })
            .always(function() {
                setTimeout(function() {
                    $("#pwd_result_msg").html("");
                    $("#pwd_form").trigger('reset');
                    $("#pwd_modal").modal("hide");
                }, 1500);
            });
        });

    } // end of if(location.href)

});