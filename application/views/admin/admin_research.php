<?php
if($this->session->userdata('m_permission')!='admin') {
    redirect('admin');
}
?>

<link href="<?=base_url();?>assets/css/admin-research.css" rel="stylesheet">

<!-- New Tab Modal -->
<div class="modal fade" id="new_tab_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">New Tab</h4>
      </div>
      <div class="modal-body text-center">
        <h3>
            New Tab?
        </h3>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div id="trash_result_msg" class="col-md-5"></div>
            <div class="col-md-5 col-md-offset-2">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="new_tab_cancel_btn">
                    <i class="fa fa-ban" aria-hidden="true"></i> Cancel
                </button>
                <button type="button" class="btn btn-primary" id="new_tab_apply_btn">
                    <i class="fa fa-check" aria-hidden="true"></i> Apply
                </button>
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tasks" aria-hidden="true"></i> Research
            </li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center"> Research </h2>
        </div>
        <div class="col-md-12 ">
            <!-- tab nav -->
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a data-toggle="tab" href="#achievement">Achievement</a></li>
                <li role="presentation"><a data-toggle="tab" href="#conference">Conference</a></li>
                <li role="presentation"><a data-toggle="tab" href="#journal">Journal</a></li>
                <li role="presentation"><a href="javascript: void(0);" onclick="$('#new_tab_modal').modal('toggle');"><i class="fa fa-plus" aria-hidden="true" style="color: #D94600;"></i></a></li>
            </ul>
            <!-- tab content -->
            <div class="tab-content">
                <div id="achievement" class="tab-pane fade in active">
                    <p>Achievement</p>
                </div>
                <div id="conference" class="tab-pane fade">
                    <p>Conference</p>
                </div>
                <div id="journals" class="tab-pane fade">
                    <p>Journal</p>
                </div>
            </div>
        </div>
    </div>
</div>