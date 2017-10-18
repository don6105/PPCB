<?php
if($this->session->userdata('m_permission')!='admin') {
    redirect('admin');
}
?>

<link href="<?=base_url();?>assets/css/admin-course.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i> Course
            </li>
        </ol>
    </div>

    <!-- Trash Member Modal -->
    <div class="modal fade" id="trash_course_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Trash Course</h4>
          </div>
          <div class="modal-body text-center">
            <h3>
                Do you really want to trash course?
            </h3>
          </div>
          <div class="modal-footer">
            <div class="row">
                <div id="trash_result_msg" class="col-md-5"></div>
                <div class="col-md-5 col-md-offset-2">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="trash_cancel_btn">
                        <i class="fa fa-ban" aria-hidden="true"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="trash_apply_btn">
                        <i class="fa fa-trash" aria-hidden="true"></i> Trash
                    </button>
                </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- New Member Modal -->
    <div class="modal fade" id="new_course_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">New Course</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <form id="new_course_form" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label class="col-md-2">Year</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="year" placeholder="course year">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Course</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" placeholder="course name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Link</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="link" placeholder="http://website.url">
                        </div>
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
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-center"> Course List </h2>
        </div>
        <div class="col-md-1">
            <botton class="btn btn-primary btn-md pull-right fix-btn-position" data-toggle="modal" data-target="#new_course_modal">
                <i class="fa fa-plus" aria-hidden="true"></i> New
            </botton>
        </div>
        <div class="col-md-12">
            <table class="table table-responsive table-hover" id="course_list">
                <tr>
                    <th class="col-md-2"> Year </th>
                    <th class="col-md-3"> Course </th>
                    <th class="col-md-5"> Link </th>
                    <th class="col-md-2"> Action </th>
                </tr>
                {course}
                <tr id="c_{c_id}">
                    <td class="col-md-2" name="year_value"> {c_year} </td>
                    <td class="col-md-3" name="name_value"> {c_name} </td>
                    <td class="col-md-5" name="link_value"> <a href="{c_link}" target="_blank">{c_link}</a> </td>
                    <td class="col-md-2">
                        <botton class="btn btn-danger btn-md" data-toggle="modal" data-target="#trash_course_modal" name="trash_btn">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </botton>
                    </td>
                </tr>
                {/course}
            </table>
        </div>
    </div>

</div>