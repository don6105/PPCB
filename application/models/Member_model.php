<?php
class Member_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_member($edu_level) {
        $this->db->order_by("m_edu_year", "desc");
        $query = $this->db->get_where('member', array('m_edu_level' => $edu_level));

        $data['level']   = $edu_level;
        $data['member']  = $query->result_array();

        $query->free_result();
        return $data;
    }
}
?>