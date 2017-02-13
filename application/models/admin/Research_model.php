<?php
class Research_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
 
    public function new_research($type, $title, $author, $date, $organization, $keyword, $description) {
        $data = array(
            'r_type'        => $type,
            'r_paper'       => $title,
            'r_author'      => $author,
            'r_publicdate'  => $date,
            'r_publicwhere' => $organization,
            'r_keyword'     => $keyword,
            'r_description' => $description
        );
        $r = $this->db->insert('research', $data);
        if($r) {
            $r_id  = $this->db->insert_id();
            $path  = 'assets/img/research/';
            $files = array_diff(scandir($path.'tmp', 1), array('..', '.', 'thumbnail'));
            $imgs  = array();
            foreach ($files as $key => $value) {
                $this->db->set('ri_research', $r_id);
                $this->db->set('ri_img', $path.$value);
                $rr = $this->db->insert('research_img');
                array_push($imgs, base_url($path.$value));
                // move file from tmp folder to parent folder
                if($rr) rename($path.'tmp/'.$value, $path.$value);
            }
            return array('result' => 'Success', 'id' => $r_id, 'img' => $imgs);
        } else {
            return array('result' => 'Failed');
        }
    }

    public function trash_research($id) {
        // delete data from research table
        $this->db->where('r_id', $id);
        $r = $this->db->delete('research');

        if($r and $this->db->affected_rows()>0) {
            // search img and delete img files
            $this->db->select('ri_img');
            $this->db->order_by("ri_id", "asc");
            $query = $this->db->get('research_img');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    @ unlink(getcwd().'/'.$row->ri_img);
                }
            }
            array_map('unlink', glob(getcwd().'/assets/img/research/tmp/thumbnail/*.*'));
            // delete data from research_img table
            $this->db->where('ri_research', $id);
            $rr = $this->db->delete('research_img');
            if($rr and $this->db->affected_rows()>0) {
                return array('result' => 'Success');
            }
            return array('result' => 'Failed');
        } else {
            return array('result' => 'Failed');
        }
    }
}
?>