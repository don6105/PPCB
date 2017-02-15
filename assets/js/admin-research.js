$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '../admin_upload/index';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p id="'+file.name.split('.')[0]+'"/>').html('<i class="fa fa-times fa-lg trash-btn" aria-hidden="true" name="trash-btn" data-type="DELETE" data-url="'+file.deleteUrl+'"></i> <img src="'+file.thumbnailUrl+'">').appendTo('#files');
                $('[name="trash-btn"]').on('click', function() {
                    $.ajax({
                        method: $(this).attr('data-type'),
                        url: $(this).attr('data-url'),
                    }).done(function(msg) {
                        msg = JSON.parse(msg);
                        if(msg[file.name]) {
                            $('#'+file.name.split('.')[0]).fadeOut(900, function() { $(this).remove(); });
                        }
                    });
                    // console.log( $(this).attr('data-type') );
                });
            });
        },
        progressall: function (e, data) {
            $('#progress .progress-bar').attr('style', "width: 0%")
                                        .addClass('active');
            var progress = parseInt(data.loaded / data.total * 100, 10);
            setTimeout(function() {
                $('#progress .progress-bar').css('width', progress+'%');
                setTimeout(function() {
                    $('#progress .progress-bar').removeClass('active');
                }, 1000);
            }, 150);
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    // new model on submit
    $('#new_apply_btn').on('click', function() {
        // empty form check
        var check = true;
        $('#new_research_form input:not("#fileupload"), textarea').each(function() {
            // if($(this).attr('type')=='date') $('[name="input_date"]').val("2017-01-01"); // for development
            // else $(this).val('1'); // for development

            if($(this).val()=='') check = false;
        });
        if(check) {
            // send data to server
            $.post(site_url+'/new_research', $('#new_research_form').serialize(), function(data) {
                var obj = JSON && JSON.parse(data) || $.parseJSON(data);
                if(obj.result.indexOf('Success') > -1) {
                    // add data to panel tab
                    var paper_img = $('<div class="col-md-6 paper-img">');
                    for (var i in obj.img) {
                        paper_img.append(
                            $('<img>').attr('src', obj.img[i])
                        );
                    }
                    var paper_box = $('<div class="col-md-6 paper-box text-center">');
                    paper_box.append(
                                $('<h4>').text($('[name="input_title"]').val())
                            ).append(
                                $('<h5>').text($('[name="input_author"]').val())
                            ).append(
                                $('<h5>').text($('[name="input_date"]').val())
                            ).append(
                                $('<h5>').text($('[name="input_organization"]').val())
                            ).append(
                                $('<h5>').text($('[name="input_keyword"]').val())
                            ).append(
                                $('<h5>').text($('[name="input_description"]').val())
                            );
                    var paper = $('<div class="col-md-12 paper">').attr('id', obj.id);
                    paper.append(
                            $('<div class="col-md-12 remove-btn">').append(
                                $('<i class="fa fa-times fa-lg" aria-hidden="true"></i>')
                            )
                        ).append(paper_box).append(paper_img);
                    $('#'+$('[name="input_type"]').val()).append(paper);
                    $('.remove-btn').on('click', function() {
                        var id = $(this).parent('.paper').attr('id');
                        $.post(site_url+'/trash_research', {id: id}, function(data) {
                            var obj = JSON && JSON.parse(data) || $.parseJSON(data);
                            if(obj.result.indexOf('Success') > -1) {
                                $('#'+id).fadeOut(1000, function() { $(this).remove(); });
                            } else {
                                $('#'+id).fadeOut(700, function() { $(this).fadeIn(700); });
                            }
                        });
                    });
                    // reset form
                    $('#new_research_form').trigger('reset');
                    $('#files').html('');
                    setTimeout(function() {
                        $('#new_research_modal').modal('hide');
                    }, 800);
                } else {

                }
            });
        }
    });

    $('#new_cancel_btn').on('click', function() {
        $.post(site_url+'/clean_img', function(data) {
            var obj = JSON && JSON.parse(data) || $.parseJSON(data);
            if(obj.result.indexOf('Success') > -1) {
                $('#new_research_form').trigger('reset');
                $('#files').html('');
                $('#new_research_modal').modal('hide');
            }
        });
    });

    $('.remove-btn').on('click', function() {
        var id = $(this).parent('.paper').attr('id');
        $.post(site_url+'/trash_research', {id: id}, function(data) {
            var obj = JSON && JSON.parse(data) || $.parseJSON(data);
            if(obj.result.indexOf('Success') > -1) {
                $('#'+id).fadeOut(1000, function() { $(this).remove(); });
            } else {
                $('#'+id).fadeOut(700, function() { $(this).fadeIn(700); });
            }
        });
    });
});


