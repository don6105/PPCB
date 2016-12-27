<?php
class Resume_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function upload_img() {
        $config['upload_path']   = 'assets/img/resume/tmp/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload' , $config);

        if(! $this->upload->do_upload('file')) {
            $data = array('error' => $this->upload->display_errors() );
        } else {
            $img  = 'assets/img/resume/tmp/'.$this->upload->data('file_name');
            $data = array('location' => base_url($img) );
        }
        return json_encode($data);
    }

    public function update_resume($resume, $imgs, $mail) {
        //explode(",",$imgs);
        $imgs = str_replace('src="../../assets/img/resume/tmp/','',$imgs);
        $imgs = str_replace('"','',$imgs);
        $imgs = explode(",",$imgs);
        foreach($imgs as $index => $value) {
            @ rename(getcwd().'/assets/img/resume/tmp/'.$value, getcwd().'/assets/img/resume/'.$value);
        }
        // delete tmp images
        @ array_map('unlink', glob(getcwd()."/assets/img/resume/tmp/*"));

        // update member.m_resume table by SQL
        $resume = str_replace('../../assets/img/resume/tmp/', base_url('assets/img/resume/'), $resume);
        $this->db->set('m_resume', $resume);
        $this->db->where('m_mail' , $mail);
        $r = $this->db->update('member');
        if($r)
            return $this->db->affected_rows();
        else
            return -1;
    }

}
?>