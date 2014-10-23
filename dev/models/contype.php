<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contype extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /* 
     * Return Category List 
     * load by Limit
     * if $num = 0 =>select all
     */
    function _showtype($num,$row){
    	$this->load->database();
		$query=$this->db->get('type',$num,$row);
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return null;
    }
    
	function _showtypeall(){
                $this->load->database();
		$query=$this->db->get('type');
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return null;
    }
    
	function _showtypebyid($id){
    	$this->load->database();
    	$this->db->where('id', $id);
		$query=$this->db->get('type');
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return null;
    }
    
    
    
    /*
     * Total row Category
     */
	function _totalrows(){
    	$this->load->database(); 
		return $this->db->count_all('category');
    }
    
    function _addtype($name,$active){
    	$this->load->database();
    	$data = array('name'=>$name,'active'=>$active);
    	$this->db->insert('type', $data); 
    }
    
 	function _updatetype($name,$active){
    	$this->load->database();
    	$data = array('name'=>$name,'active'=>$active);
		$this->db->where('id', $id);
		$this->db->update('type', $data); 
    }
    
    function _deltype($id){
    	$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('type');
    } 
    
    
}