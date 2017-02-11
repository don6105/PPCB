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
});