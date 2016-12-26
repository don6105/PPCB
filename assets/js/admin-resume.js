$( document ).ready(function() {

    if(location.href.indexOf("admin/resume")>-1) {

        // TinyMCE(rich editor)
        tinymce.init({
            selector:'#resume_editor',
            forced_root_block : "",
            plugins: [
                'advlist autolink lists link image charmap preview hr anchor',
                'searchreplace wordcount visualchars code',
                'media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc' ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '../../assets/js/tinymce/skins/custom/codepen.min.css'
            ],
            file_picker_types: 'image',
            file_picker_callback: function(callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            callback(e.target.result, {
                                alt: ''
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                }
            }
        }); // end of tinymce.init

        $("#save_resume_btn").on("click", function() {
            var editor = tinyMCE.get('resume_editor');
            editor.setProgressState(1); // Show progress
            editor.setProgressState(0); // Hide progress
            // console.log( editor.getContent() );
            $.post(site_url+"/update_resume", {resume: editor.getContent()}, function() {

            });
        });

    } // end of if(location.href)

});