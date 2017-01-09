<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller {

	public function __construct() {
		parent::__construct();

        $this->load->model('admin/login_model');
        $this->load->model('admin/member_model');
        $this->load->model('admin/course_model');
        $this->load->model('admin/resume_model');
	}

    /************************
     *                      *
     *  Login AJAX Action   *
     *                      *
     ************************/
    public function login() {
        $mail   = $this->input->post('usermail');
        $passwd = $this->input->post('password');
        $r = $this->login_model->login($mail, $passwd);
        echo json_encode($r);
    }

    public function logout() {
        $r = $this->login_model->logout();
        echo json_encode($r);
    }


    /************************
     *                      *
     *  Member AJAX Action  *
     *                      *
     ************************/
    public function new_member() {
        $name       = $this->input->post('name');
        $name_en    = $this->input->post('name_en');
        $pwd        = $this->input->post('pwd');
        $mail       = $this->input->post('mail');
        $level      = $this->input->post('edu_level');
        $year       = $this->input->post('edu_year');
        $permission = $this->input->post('permission');

        $r = $this->member_model->new_member($name, $name_en, $pwd, $mail, $level, $year, $permission);
        echo json_encode($r);
    }

    public function mod_member() {
        $id         = $this->input->post('id');
        $name       = $this->input->post('name');
        $name_en    = $this->input->post('name_en');
        $mail       = $this->input->post('mail');
        $level      = $this->input->post('level');
        $year       = $this->input->post('year');
        $permission = $this->input->post('permission');

        $r = $this->member_model->mod_member($id, $name, $name_en, $mail, $level, $year, $permission);
        if($r > 0) echo 'Success';
        else echo 'Failed';
    }

    public function trash_member() {
        $id = $this->input->post('row');

        $r = $this->member_model->trash_member($id);
        if($r > 0) echo 'Success';
        else echo 'Failed';
    }

    public function change_pwd() {
        $id  = $this->input->post('row');
        $pwd = $this->input->post('pwd');
        if($id=='self') $id = $this->session->userdata('m_id');

        $r = $this->member_model->change_pwd($id, $pwd);
        if($r > 0) echo 'Success';
        else echo 'Failed';
    }


    /************************
     *                      *
     *  Course AJAX Action  *
     *                      *
     ************************/
    public function new_course() {
        $year = $this->input->post('year');
        $name = $this->input->post('name');
        $link = $this->input->post('link');

        $r = $this->course_model->new_course($name, $year, $link);
        if($r > 0)
            $r = array('result' => 'Success', 'id' => $r);
        else
            $r = array('result' => 'Failed');
        echo json_encode($r);
    }

    public function trash_course() {
        $id = $this->input->post('row');

        $r = $this->course_model->trash_course($id);
        if($r > 0) echo 'Success';
        else echo 'Failed';
    }

    /************************
     *                      *
     *  Resume AJAX Action  *
     *                      *
     ************************/
    public function upload_img() {
        $r = $this->resume_model->upload_img();
        echo $r;
    }

    public function update_resume() {
        $resume = $this->input->post('resume');
        $imgs   = $this->input->post('imgs');

        $r = $this->resume_model->update_resume($resume, $imgs, $this->session->userdata('m_mail'));
        echo $r;
    }

    public function get_resume() {
        $m_id = $this->session->userdata('m_id');

        $r = $this->resume_model->get_resume($m_id);
        echo $r;
    }

}
