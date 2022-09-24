<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_models extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database('innsightdb');
    
    }

    public function get_all_users()
    {
        return $q = $this->db->get('users')->result_array();
    }
    public function insert_data($tblname, $data)
    {
        $this->db->insert($tblname, $data);
        return $this->db->insert_id();
    }
    public function delete_data($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('users');  
    }
    public function get_id_wise_detail($tblname,$id) {
       
        $this->db->select('*');
        $this->db->from($tblname);
        $this->db->where('id', $id);
        return $this->db->get()->result_array();
    }
    public function update_data($tblname, $editData, $id) {
        $this->db->where('id', $id);
        if ($this->db->update($tblname, $editData)) {
            return true;
        } else {
            return false;
        }
    }

}
