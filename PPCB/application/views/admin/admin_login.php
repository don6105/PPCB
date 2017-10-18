<!-- login style -->
<link href="<?=base_url();?>assets/css/admin-login.css" rel="stylesheet">

<div class="container">
    <div class="row vertical-offset">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row-fluid user-row">
                        <img src="<?=base_url('assets/img/PPCB/logo_sm_2_mr_1.png');?>" class="img-responsive" alt="Conxole Admin"/>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="login_msg"></div>
                    <form id="login_form" accept-charset="UTF-8" class="form-signin">
                        <label class="panel-login">
                            <div class="login_result"></div>
                        </label>
                        <input class="form-control" placeholder="User@mail.com" id="usermail" type="text">
                        <input class="form-control" placeholder="Password" id="password" type="password">
                    </form>
                    <button class="btn btn-lg btn-success btn-block" id="login-btn">Login »</button>
                </div>
            </div>
        </div>
    </div>
</div>