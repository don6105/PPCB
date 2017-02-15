<?php
class Research_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_researchs() {
        $data = array();
        $r_type = array('achievement', 'conference', 'journal');
        foreach ($r_type as $key => $value) {
            $this->db->select('*');
            $this->db->from('research');
            $this->db->join('research_img', 'research.r_id = research_img.ri_research', 'left');
            $this->db->where('r_type', $value);
            $this->db->group_by("research_img.ri_research");

            $query = $this->db->get();
            if ($query->num_rows() > 0)
                $data[$value] = $query->result_array();
            else
                $data[$value] = array();
        }
        return $data;
    }

    public function get_research($r_id) {
        $data = array();
        $imgs = array();
        // get paper detail
        $this->db->where('r_id', $r_id);
        $query = $this->db->get('research');
        if ($query->num_rows() == 1) {
            $data['data'] = $query->result_array()[0];

            //get paper img
            $this->db->select('ri_img');
            $this->db->where('ri_research', $r_id);
            $query2 = $this->db->get('research_img');
            if ($query2->num_rows() > 0) {
                foreach ($query2->result() as $row) {
                    array_push($imgs, $row->ri_img);
                }
                $data['imgs'] = $imgs;
            } else {
                $data['imgs'] = '';
            }
            $data['result'] = 'Success';
        } else {
            $data['result'] = 'Failed';
        }

        return $data;
    }
}
?>