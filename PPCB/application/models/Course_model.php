<?php
class Course_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_course(){
        $this->db->group_by('c_year');
        $this->db->order_by("c_year", "desc");
        $query = $this->db->get('course');

        $i = 0;
        foreach ($query->result() as $row) {
            $query2 = $this->db->get_where('course', array('c_year' => $row->c_year));
            $data[$i]['year']   = $row->c_year;
            $data[$i]['course'] = $query2->result_array();
            $i++;
        }
        $query->free_result();

        return $data;
    }
}
?>