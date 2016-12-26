<?php
class Resume_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /*
    public function new_member($name, $name_en, $pwd, $mail, $level, $year, $permission) {
        $config['upload_path']   = 'assets/img/member/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name']     = md5(uniqid(mt_rand()));
        $this->load->library('upload' , $config);
        if(! $this->upload->do_upload('img')) {
            $data = array('result' => 'Failed '.$this->upload->display_errors());
        } else {
            $pwd = md5($pwd);
            $img  = 'assets/img/member/'.$this->upload->data('file_name');
            $data = array(
                'm_img'        => $img,
                'm_name'       => $name,
                'm_name_en'    => $name_en,
                'm_pwd'        => $pwd,
                'm_mail'       => $mail,
                'm_edu_level'  => $level,
                'm_edu_year'   => $year,
                'm_permission' => $permission
            );
            $r = $this->db->insert('member', $data);
            if($r)
                $data = array('result' => 'Success', 'id' => $this->db->insert_id(), 'img' => $img);
            else
                $data = array('result' => 'Failed');
        }
        return $data;
    }

    public function mod_member($id, $name, $name_en, $mail, $level, $year, $permission) {
        $data = array(
            'm_name'       => $name,
            'm_name_en'    => $name_en,
            'm_mail'       => $mail,
            'm_edu_level'  => $level,
            'm_edu_year'   => $year,
            'm_permission' => $permission
        );
        $id = str_replace('m_', '', $id);
        $this->db->where('m_id' , $id);
        $r = $this->db->update('member', $data);
        if($r)
            return $this->db->affected_rows();
        else
            return -1;
    }
    */
}
?>