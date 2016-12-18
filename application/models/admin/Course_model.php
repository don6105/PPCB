<?php
class Course_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_course() {
        $this->db->order_by("c_year, c_id", "desc");
        $query = $this->db->get('course');
        $data['course'] = $query->result_array();
        $query->free_result();
        return $data;
    }

    public function new_member($img, $name, $name_en, $mail, $level, $year, $permission) {
        $data = array(
            'm_img'        => $img,
            'm_name'       => $name,
            'm_name_en'    => $name_en,
            'm_mail'       => $mail,
            'm_edu_level'  => $level,
            'm_edu_year'   => $year,
            'm_permission' => $permission
        );
        $r = $this->db->insert('member', $data);
        if($r) return $this->db->insert_id();
        else return -1;
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

    public function trash_member($id) {
        $id = str_replace('m_', '', $id);

        // search img path
        $this->db->select('m_img');
        $this->db->where('m_id', $id);
        $query = $this->db->get('member');
        $img = $query->row()->m_img;

        $this->db->where('m_id', $id);
        $r = $this->db->delete('member');
        if($r) {
            unlink(getcwd().'/'.$img);
            return $this->db->affected_rows();
        }
        else
            return -1;
    }
}
?>