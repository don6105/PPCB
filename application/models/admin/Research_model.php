<?php
class Research_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_research($r_type) {
        $this->db->where('r_type', $r_type);
        $this->db->order_by("r_id", "asc");
        $query = $this->db->get('research');
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            for($i=0; $i<count($data); $i++) {
                $r_id = $data[$i]['r_id'];
                $this->db->select('ri_img');
                $this->db->where('ri_research', $r_id);
                $query2 = $this->db->get('research_img');
                $data[$i]['r_imgs'] = array();
                foreach ($query2->result() as $row) {
                    array_push($data[$i]['r_imgs'], array('r_img' => $row->ri_img));
                }
            }
            return $data;
        } else {
            return false;
        }
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
            $this->db->where('ri_research', $id);
            $this->db->order_by("ri_id", "asc");
            $query = $this->db->get('research_img');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    @ unlink(getcwd().'/'.$row->ri_img);
                }
            }
            @ array_map('unlink', glob(getcwd().'/assets/img/research/tmp/thumbnail/*.*'));
            // delete data from research_img table
            $this->db->where('ri_research', $id);
            $this->db->delete('research_img');
            return array('result' => 'Success');
        } else {
            return array('result' => 'Failed');
        }
    }

    public function clean_tmp_img() {
        @ array_map('unlink', glob(getcwd().'/assets/img/research/tmp/*.*'));
        return array('result' => 'Success');
    }
}
?>