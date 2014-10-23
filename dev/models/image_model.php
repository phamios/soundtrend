<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
    function _showimages(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('tblimages');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _showimagepost(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('imagepost');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
	 
    
	function _showimagepostmerchant(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
    	$this->db->where('merchant',1);
        $query=$this->db->get('imagepost');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _addimages($images){
    	$this->load->database();
    	$data = array('images'=>$images);
    	$this->db->insert('tblimages', $data); 
    }
    
    function _getlastid(){
        $this->load->database(); 
    	$this->db->select_max('id');
        $query = $this->db->get('tblimages');
    	foreach($query->result() as $row)
          {
          	return $row->id;
          }
        return 0;
    }
    
    function _addimagepost($postid,$type,$imagename){
    	$this->load->database();
        $imageid = $this->_getlastid();
    	$data = array('imageid'=>$imageid,'postid'=>$postid,'type'=>$type,'imagename'=>$imagename);
    	$this->db->insert('imagepost', $data); 
    }
    
    function _updateimages($id,$images){
    	$this->load->database();
        $data = array('images'=>$images);
        $this->db->where('id', $id);
        $this->db->update('tblimages', $data); 
    }
    
	
    
    function _delimages($id){
    	$this->load->database();
        $this->db->where(array('id'=>$id));
        $this->db->delete('imagepost');
       
    }
    
    function _delimage($id){
    	$this->load->database();
        $this->db->where(array('id'=>$id));
        $query = $this->db->get('imagepost');
        $idimage = 0;
        foreach($query->result() as $row)
          {
          	$idimage = $row->imageid;
          }
          
       return $idimage; 
    }
    
    function delallimage($id){
        $this->load->database();
        $this->db->where(array('id'=>$id)); 
        $this->db->delete('tblimages'); 
    }
    
    
}