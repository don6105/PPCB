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

    public function new_course($year, $name, $link) {
        $data = array(
            'c_year' => $year,
            'c_name' => $name,
            'c_link' => $link,
        );
        $r = $this->db->insert('course', $data);
        if($r) return $this->db->insert_id();
        else return -1;
    }

    public function trash_course($id) {
        $id = str_replace('c_', '', $id);

        $this->db->where('c_id', $id);
        $r = $this->db->delete('course');
        if($r)
            return $this->db->affected_rows();
        else
            return -1;
    }
}
?>