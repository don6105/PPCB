$( document ).ready(function() {
    // TinyMCE(rich editor)
    tinymce.init({
        selector:'#resume_editor',
        forced_root_block : "",
        plugins: [
            'advlist autolink lists link image charmap preview hr anchor',
            'searchreplace wordcount visualchars code',
            'media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc' ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: 'preview | forecolor backcolor emoticons | insert codesample link image media',
        image_advtab: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '../../assets/vendor/tinymce/skins/custom/codepen.min.css'
        ],
        plugin_preview_width: 1000,
        // enable advanced tab
        image_advtab: true,
        // enable title field in the Image dialog
        image_title: true,
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
        images_upload_url: '../admin_ajax/upload_img',
        // here we add custom filepicker only to Image dialog
        file_picker_types: 'image',
        // and here's our custom image picker
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            // Note: In modern browsers input[type="file"] is functional without
            // even adding it to the DOM, but that might not be the case in some older
            // or quirky browsers like IE, so you might want to add it to the DOM
            // just in case, and visually hide it. And do not forget do remove it
            // once you do not need it anymore.
            input.onchange = function() {
                var file = this.files[0];
                // Note: Now we need to register the blob in TinyMCEs image blob
                // registry. In the next release this part hopefully won't be
                // necessary, as we are looking to handle it internally.
                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var blobInfo = blobCache.create(id, file);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
            };
            input.click();
        },
        init_instance_callback: function(instance) {
            $.post(site_url+"/get_resume", {}, function(data) {
                tinyMCE.activeEditor.setContent(data);
            });
        }
    }); // end of tinymce.init

    $("#save_resume_btn").on("click", function() {
        var editor = tinyMCE.activeEditor;
        var imgs   = tinyMCE.activeEditor.getContent().match(/src="\S+.(gif|jpg|jpeg|png)"/g);
        if(imgs!=null) {
            if(imgs.length>1)  imgs = imgs.join(",");
            if(imgs.length==1) imgs = imgs[0];
        }

        editor.setProgressState(1); // Show progress

        $.post(site_url+"/update_resume", {resume: editor.getContent(), imgs: imgs}, function() {
            setTimeout(function() {
                editor.setProgressState(0); // Hide progress
            }, 1200);
        });
    });

});