    </div> <!-- page-wrapper -->
</div><!-- wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- TinyMCE(rich editor) -->
<script src="<?=base_url();?>assets/js/tinymce/tinymce.min.js"></script>

<!-- My JavaScript -->
<script src="<?=base_url();?>assets/js/admin-resume.js"></script>
<script src="<?=base_url();?>assets/js/admin-member.js"></script>
<script src="<?=base_url();?>assets/js/admin-course.js"></script>

<script>
    var site_url = "<?=site_url('admin_ajax')?>";
    $( document ).ready(function() {
        // nav menu active
        var dir = "<?=$this->uri->segment(2, 'home')?>";
        $("#"+dir+"_dir").addClass('active');
    });
</script>

</body>
</html>