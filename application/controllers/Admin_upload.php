<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	error_reporting(E_ALL | E_STRICT);
        $params = array(
			'script_url' => site_url('Admin_upload'),
			'upload_dir' => 'assets/img/research/tmp/',
			'upload_url' => base_url('assets/img/research/tmp/')
		);
        $this->load->library("UploadHandler", $params);
    }
}
?>