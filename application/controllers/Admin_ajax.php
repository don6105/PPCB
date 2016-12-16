<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('admin/member_model');
	}

    public function new_member() {
        $config['upload_path']   = 'assets/img/member/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name']     = md5(uniqid(mt_rand()));
        $this->load->library('upload' , $config);

        $name       = $this->input->post('name');
        $name_en    = $this->input->post('name_en');
        $mail       = $this->input->post('mail');
        $level      = $this->input->post('edu_level');
        $year       = $this->input->post('edu_year');
        $permission = $this->input->post('permission');

        if(! $this->upload->do_upload('img')) {
            // $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            $data = array('result' => 'Failed');
            echo json_encode($data);
        }
        else {
            $img  = 'assets/img/member/'.$this->upload->data('file_name');
            $r = $this->member_model->new_member($img, $name, $name_en, $mail, $level, $year, $permission);
            if($r != -1) {
                $data = array('result' => 'Success', 'id' => $r, 'img' => $img);
                echo json_encode($data);
            }
            else {
                $data = array('result' => 'Failed');
                echo json_encode($data);
            }
        }
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
        $id         = $this->input->post('row');
        $r = $this->member_model->trash_member($id);
        if($r > 0) echo 'Success';
        else echo 'Failed';
    }

}
