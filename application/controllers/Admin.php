<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library('parser');
        $this->load->model('admin/member_model');
        $this->load->model('admin/course_model');

		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_nav');
	}

	public function index() {
        $this->load->view('admin/admin_index');
		$this->load->view('admin/admin_footer');
	}

    public function resume() {
        $this->load->view('admin/resume');
        $this->load->view('admin/admin_footer');
    }

    public function member() {
        $data = $this->member_model->get_member('Master');
        $this->parser->parse('admin/template/member_template', $data);
        $this->load->view('admin/admin_footer');
    }

    public function research() {
        $this->load->view('admin/admin_footer');
    }

    public function course() {
        $data = $this->course_model->get_course();
        $this->parser->parse('admin/template/course_template', $data);
        $this->load->view('admin/admin_footer');
    }
}
