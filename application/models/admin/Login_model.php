<?php
class Login_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_pwd($mail) {
        $this->db->select('m_pwd');
        $query = $this->db->get_where('member', array('m_mail' => $mail));

        if($query->num_rows()>0) {
            $row   = $query->row();
            $m_pwd = $row->m_pwd;
            $query->free_result();
            return $m_pwd;
        } else {
            return -1;
        }
    }

    public function get_user_data($mail) {
        $this->db->select('m_id, m_name, m_name_en, m_mail, m_permission');
        $query = $this->db->get_where('member', array('m_mail' => $mail));
        if($query->num_rows()>0) {
            $data = $query->row_array();
            $query->free_result();
            return $data;
        } else {
            return -1;
        }
    }

    public function login($mail, $passwd) {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // mail is invaled
            $data = array('result' => 'Error');
        } else {
            $r = self::get_pwd($mail);
            if($r!=-1) {
                if(strcmp($r, md5($passwd))==0) {
                    // password is matched
                    // get user data & set session
                    $user_data = self::get_user_data($mail);
                    $this->session->set_userdata($user_data);
                    // echo $this->session->userdata('m_pwd');
                    $data = array('result' => 'Success', 'redirect' => site_url('admin/index'));
                }
                else {
                    // password isn't matched
                    $data = array('result' => 'Failed');
                }
            } else {
                // no user
                $data = array('result' => 'Error');
            }

        }
        return $data;
    }

    public function logout() {
        $this->session->sess_destroy();
        return $data = array('result' => 'Success', 'redirect' => site_url('admin/index'));;
    }

}
?>