<?php
class Posts_model extends CI_Model
{
    public function FetchPosts($Page_Start,$Per_Page)
    {
        $this->db->limit($Per_Page,$Page_Start);
        $Query  = $this->db->get('tbl_posts');
        // echo $this->db->last_query();
        return $Query->result();
    }
}
