<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('admin/member_model');
        $this->load->model('admin/course_model');
        $this->load->model('admin/resume_model');
        $this->load->model('admin/research_model');

		$this->load->view('admin/admin_header');
	}

    public function login() {
        $this->load->view('admin/admin_login');
        $this->load->view('admin/admin_footer');
    }

	public function index() {
        $this->load->view('admin/admin_nav');
        $this->load->view('admin/admin_index');
		$this->load->view('admin/admin_footer');
	}

    public function resume() {
        $this->load->view('admin/admin_nav');
        $this->load->view('admin/admin_resume');
        $this->load->view('admin/admin_footer');
    }

    public function member() {
        $this->load->view('admin/admin_nav');
        $data = $this->member_model->get_member('Master');
        $this->parser->parse('admin/template/member_template', $data);
        $this->load->view('admin/admin_footer');
    }

    public function research() {
        $this->load->view('admin/admin_nav');
        $this->load->view('admin/admin_research1');

        $data = $this->research_model->get_research('achievement');
        if($data)
            for($i=0; $i<count($data); $i++)
                $this->parser->parse('admin/template/research_template', $data[$i]);
        $this->load->view('admin/admin_research2');

        $data = $this->research_model->get_research('conference');
        if($data)
            for($i=0; $i<count($data); $i++)
                $this->parser->parse('admin/template/research_template', $data[$i]);
        $this->load->view('admin/admin_research3');

        $data = $this->research_model->get_research('journal');
        if($data)
            for($i=0; $i<count($data); $i++)
                $this->parser->parse('admin/template/research_template', $data[$i]);
            
        $this->load->view('admin/admin_research4');
        $this->load->view('admin/admin_footer');
    }

    public function course() {
        $this->load->view('admin/admin_nav');
        $data = $this->course_model->get_course();
        $this->parser->parse('admin/template/course_template', $data);
        $this->load->view('admin/admin_footer');
    }
}
