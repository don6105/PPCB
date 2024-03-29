<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library('parser');
        $this->load->model('course_model');
        $this->load->model('member_model');
        $this->load->model('research_model');

		$this->load->view('header');
		$this->load->view('nav');
	}

	public function index() {
		$this->load->view('index');
		$this->load->view('about');
        // Member
		$this->load->view('member1');
        $data1 = $this->member_model->get_member('Adviser');
        $data2 = $this->member_model->get_member('Doctoral');
        $data3 = $this->member_model->get_member('Master');
        $this->parser->parse('template/adviser_template', $data1);
        $this->parser->parse('template/student_template', $data2);
        $this->parser->parse('template/student_template', $data3);
        $this->load->view('member2');

        // Research
        $data = $this->research_model->get_researchs();
        $this->parser->parse('template/research_template', $data);

        // Course
        $this->load->view('course1');
        $data = $this->course_model->get_course();
        foreach ($data as $row) {
            $this->parser->parse('template/course_template', $row);
        }
		$this->load->view('course2');
        // Gallery
        // $this->load->view('gallery');
        // Bottom nav
        $this->load->view('design');
		$this->load->view('footer');
	}
}
