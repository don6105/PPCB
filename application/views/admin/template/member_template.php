<div class="container-fluid">
    <div class="row">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users" aria-hidden="true"></i> Member
            </li>
        </ol>
    </div>

    <!-- Trash Member Modal -->
    <div class="modal fade" id="trash_member" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Trash Member</h4>
          </div>
          <div class="modal-body text-center">
            <h3>
                Do you really want to trash member?
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
    <div class="modal fade" id="new_member" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">New Member</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <form id="new_member_form" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <input type="file" class="btn form-control" name="img" data-show-preview="true">
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name_en" placeholder="Name(en)">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Email</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="mail" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Edu</label>
                        <div class="col-md-5">
                            <select class="form-control" name="edu_level">
                                <option>Adviser</option>
                                <option>Doctoral</option>
                                <option>Master</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="edu_year" placeholder="Year">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-2">Permission</label>
                        <div class="col-md-10">
                            <select class="form-control" name="permission">
                                <option>admin</option>
                                <option>normal</option>
                            </select>
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


    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center"> Member List </h2>
        </div>
        <div class="col-md-12">
            <table class="table table-responsive table-hover" id="member_list">
                <tr>
                    <th class="col-md-2"> Picture </th>
                    <th class="col-md-2"> Name </th>
                    <th class="col-md-4"> Mail </th>
                    <th class="col-md-2" colspan="2"> Edu </th>
                    <th class="col-md-1"> Admin </th>
                    <th class="col-md-1"> Action </th>
                </tr>
                {member}
                <tr id="m_{m_id}">
                    <td class="col-md-2"> <img src="<?=base_url()?>{m_img}" class="member-img"> </td>
                    <td class="col-md-2" contenteditable="true" name="name_value"> {m_name_en} ({m_name}) </td>
                    <td class="col-md-4" contenteditable="true" name="mail_value"> {m_mail} </td>
                    <td class="col-md-1">
                        <input type="hidden" name="hidden_edu_level" value="{m_edu_level}">
                        <select class="form-control" name="edu_level_value">
                            <option value="Adviser">Adviser</option>
                            <option value="Doctoral">Doctoral</option>
                            <option value="Master">Master</option>
                        </select>
                    </td>
                    <td class="col-md-1" contenteditable="true" name="edu_year_value">
                        {m_edu_year}
                    </td>
                    <td class="col-md-1">
                        <!-- <span class="{m_permission}-color"> {m_permission} </sapn> -->
                        <input type="hidden" name="hidden_permission" value="{m_permission}">
                        <select class="form-control" name="permission_value">
                            <option value="admin">Admin</option>
                            <option value="normal">Normal</option>
                        </select>
                    </td>
                    <td class="col-md-1">
                        <botton class="btn btn-danger btn-md" data-toggle="modal" data-target="#trash_member" name="trash_btn">
                            <i class="fa fa-trash" aria-hidden="true"></i> Trash
                        </botton>
                    </td>
                </tr>
                {/member}
            </table>

            <botton class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#new_member">
             <i class="fa fa-plus" aria-hidden="true"></i> New
            </botton>
        </div>
    </div>

</div>