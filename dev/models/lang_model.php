<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lang_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
    function _showlang(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('langue');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _addlang($name){
    	$this->load->database();
    	$data = array('name'=>$name);
    	$this->db->insert('langue', $data); 
    }
    
    function _updatelang($id,$name){
    	$this->load->database();
        $data = array('name'=>$name);
        $this->db->where('id', $id);
        $this->db->update('langue', $data); 
    }
    
    
    function _menuid($name){
        $menuid = 0;
        $this->load->database();
    	$this->db->where("name", $name);  
        $query=$this->db->get('langue');
        if ($query->num_rows() > 0)
        {
          foreach($query->result() as $row){
              $menuid = $row->id;
          }
        }else{
            $menuid = -1;
        }
        return $menuid;
    }
    
    function _dellang($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('langue');
    } 
    
    
}