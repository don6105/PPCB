<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ajax extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('member_model');
	}

    public function get_resume() {
        $m_id = $this->input->post('id');
        $data = $this->member_model->get_resume($m_id);
        echo json_encode($data);
    }
}
