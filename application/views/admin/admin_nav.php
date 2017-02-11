<?php
if(!$this->session->has_userdata('m_mail')) {
    redirect('admin/login');
}
?>

<!-- Pwd Member Modal -->
<div class="modal fade" id="personal_pwd_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Change Password</h4>
      </div>
      <div class="modal-body text-center">
        <div class="row">
            <form id="personal_pwd_form">
                <label class="col-md-2 col-md-offset-1" style="padding-top: 7px;">Password</label>
                <div class="col-md-8" style="padding-bottom: 10px;">
                    <input type="password" class="form-control" id="change_pwd1" placeholder="Password">
                </div>
                <label class="col-md-2 col-md-offset-1" style="padding-top: 7px;">Repeat</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="change_pwd2" placeholder="Repeat Password">
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div id="personal_pwd_result_msg" class="col-md-5"></div>
            <div class="col-md-5 col-md-offset-2">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="personal_pwd_cancel_btn">
                    <i class="fa fa-ban" aria-hidden="true"></i> Cancel
                </button>
                <button type="button" class="btn btn-primary" id="personal_pwd_apply_btn">
                    <i class="fa fa-key" aria-hidden="true"></i> Change
                </button>
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url()?>/admin">PPCB Admin</a>
        </div>

        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$this->session->userdata('m_name').' ('.$this->session->userdata('m_name_en').')';?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!--
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    -->
                    <li>
                        <a data-toggle="modal" data-target="#personal_pwd_modal"><i class="fa fa-fw fa-key"></i> Password</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript: void(0);" id="logout_link"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <?php if($this->session->has_userdata('m_mail')) { ?>
                <li id="home_dir">
                    <a href="<?=site_url()?>admin">
                        <i class="fa fa-fw fa-home" aria-hidden="true"></i> Home
                    </a>
                </li>
                <li id="resume_dir">
                    <a href="<?=site_url()?>admin/resume">
                        <i class="fa fa-fw fa-user" aria-hidden="true"></i> Resume
                    </a>
                </li>
                <?php } ?>
                <?php if($this->session->has_userdata('m_permission') && $this->session->userdata('m_permission')=='admin') { ?>
                <li id="member_dir">
                    <a href="<?=site_url()?>admin/member">
                        <i class="fa fa-fw fa-users" aria-hidden="true"></i> Member
                    </a>
                </li>
                <li id="research_dir">
                    <a href="<?=site_url()?>admin/research">
                        <i class="fa fa-fw fa-tasks" aria-hidden="true"></i> Research
                    </a>
                </li>
                <li id="course_dir">
                    <a href="<?=site_url()?>admin/course">
                        <i class="fa fa-fw fa-graduation-cap" aria-hidden="true"></i> Course
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">