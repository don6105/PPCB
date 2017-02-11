     </div> <!-- page-wrapper -->
</div><!-- wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- My logout JS -->
<script src="<?=base_url();?>assets/js/admin-login.js"></script>

<script>
    // dynamic load JS & CSS
    var loadjscssfile = function(filename, filetype, callbackfn) {
        if (filetype == "js") {
            //if filename is a external JavaScript file
            var fileref  = document.createElement('script');
            fileref.type = "text/javascript";
            fileref.setAttribute("async", "true");
            fileref.setAttribute("src", filename);
            if(fileref.readyState) {
                fileref.onreadystatechange = function() {
                  if(/loaded|complete/.test(fileref.readyState)) callbackfn();
                }
            } else {
                fileref.addEventListener("load", callbackfn, false);
            }
        }
        else if (filetype == "css") {
            //if filename is an external CSS file
            var fileref  = document.createElement("link");
            fileref.type = "text/css";
            fileref.setAttribute("async", "true");
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("href", filename);
        }
        if (typeof fileref != "undefined")
            document.getElementsByTagName("head")[0].appendChild(fileref);
    }

    // My JavaScript
    var page = location.href.replace("<?=site_url()?>", "");
    switch(page) {
        case "admin/resume":
            loadjscssfile("<?=base_url();?>assets/css/admin-resume.css", "css");
            loadjscssfile("<?=base_url();?>assets/vendor/tinymce/tinymce.min.js", "js", function() {
                loadjscssfile("<?=base_url();?>assets/js/admin-resume.js", "js");
            }); // TinyMCE(rich editor)
            break;
        case "admin/member":
            loadjscssfile("<?=base_url();?>assets/js/admin-member.js", "js");
            break;
        case "admin/course":
            loadjscssfile("<?=base_url();?>assets/js/admin-course.js", "js");
            break;
        case "admin/research":
            // jquery datepicker
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-ui/jquery-ui.min.css", "css");
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-ui/jquery-ui.min.js", "js", function() {
                $("[name='input_date']").datepicker( {showButtonPanel: true} );
                $("[name='input_date']").datepicker( "option", "dateFormat", "yy/mm/dd" );
            });
            // jquery file upload
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-file-upload/css/jquery.fileupload.css", "css");
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-file-upload/js/vendor/jquery.ui.widget.js", "js");
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-file-upload/js/jquery.iframe-transport.js", "js");
            loadjscssfile("<?=base_url();?>assets/vendor/jquery/jquery-file-upload/js/jquery.fileupload.js", "js", function() {
                loadjscssfile("<?=base_url();?>assets/js/admin-research.js", "js");
            });
            break;
    }

    var site_url = "<?=site_url('admin_ajax')?>";
    $( document ).ready(function() {
        // nav menu active
        var dir = "<?=$this->uri->segment(2, 'home')?>";
        $("#"+dir+"_dir").addClass('active');
    });
</script>

</body>
</html>