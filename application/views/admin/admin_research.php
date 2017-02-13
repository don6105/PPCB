<?php
if($this->session->userdata('m_permission')!='admin') {
    redirect('admin');
}
?>
<link href="<?=base_url();?>assets/css/admin-research.css" rel="stylesheet">
<link href="<?=base_url();?>assets/vendor/jquery/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet">
<link href="<?=base_url();?>assets/vendor/jquery/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet">
<noscript>
    <link href="<?=base_url();?>assets/vendor/jquery/jquery-file-upload/css/jquery.fileupload-noscript.css" rel="stylesheet">
</noscript>
<noscript>
    <link href="<?=base_url();?>assets/vendor/jquery/jquery-file-upload/css/jquery.fileupload-ui-noscript.css" rel="stylesheet">
</noscript>

<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tasks" aria-hidden="true"></i> Research
            </li>
        </ol>
    </div>


    <!-- New Research Modal -->
    <div class="modal fade" id="new_research_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">New Research</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <form id="new_research_form" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Type</label>
                        <label class="col-md-9">
                            <select class="form-control" name="input_type">
                                <option value="achievement">Achievement</option>
                                <option value="conference">Conference</option>
                                <option value="jounel">Journal</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Title</label>
                        <label class="col-md-9">
                            <input type="text" class="form-control" name="input_title" placeholder="Paper Title" value="Building a Powerful and Energy-efficient Computing Platform with NVIDIA Jetson TK1 and its Applications.">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Author</label>
                        <label class="col-md-9">
                            <input type="text" class="form-control" name="input_author" placeholder="Paper Author" value="Jin Ye, Chun-Yuan Lin.">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Date</label>
                        <label class="col-md-9">
                            <input type="date" class="form-control" name="input_date" placeholder="Public Date(YYYY/MM/DD)" value="2016-11-05">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Organization</label>
                        <label class="col-md-9">
                            <input type="text" class="form-control" name="input_organization" placeholder="Public Organization" value="ChangGung University">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center">Keyword</label>
                        <label class="col-md-9">
                            <input type="text" class="form-control" name="input_keyword" placeholder="Keyword" value="CUDA, NVIDIA Jetson TK1.">
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 text-center textarea-label">Description</label>
                        <label class="col-md-9">
                            <textarea class="form-control" rows="5" name="input_description" placeholder="Description">123</textarea>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Select files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </span>
                        <br>
                        <br>
                        <!-- The global progress bar -->
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-primary progress-bar-striped"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files"></div>
                    </div>
                </form>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
                <div id="new_result_msg" class="col-md-5"></div>
                <div class="col-md-5 col-md-offset-2">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="new_cancel_btn">
                        <i class="fa fa-ban" aria-hidden="true"></i> Close
                    </button>
                    <button type="button" class="btn btn-primary" id="new_apply_btn">
                        <i class="fa fa-check" aria-hidden="true"></i> Apply
                    </button>
                </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <!-- Main content -->
    <div class="row">
        <div class="col-md-11">
            <h2 class="text-center"> Research </h2>
        </div>
        <div class="col-md-1">
            <botton class="btn btn-primary btn-md pull-right fix-btn-position" data-toggle="modal" data-target="#new_research_modal">
                <i class="fa fa-plus" aria-hidden="true"></i> New
            </botton>
        </div>
        <div class="col-md-12 ">
            <!-- tab nav -->
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a data-toggle="tab" href="#achievement">Achievement</a></li>
                <li role="presentation"><a data-toggle="tab" href="#conference">Conference</a></li>
                <li role="presentation"><a data-toggle="tab" href="#journal">Journal</a></li>
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