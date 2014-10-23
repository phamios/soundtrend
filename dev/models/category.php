<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Model {
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
    function _showcate($num,$row){
    	$this->load->database();
    	$this->db->order_by("id", "desc"); 
    	$this->db->where('active', '1');
		$query=$this->db->get('category',$num,$row);
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return $query->result();
    }
    
    function getchildmenu($cateid=0){
    	$this->load->database();
    	$this->db->where(array('active'=>1,'contenttype'=>$cateid));
		$query=$this->db->get('category');
		if ($query->num_rows() > 0)
        {
	    	return $query->result();
        }  
        return $query->result();
    }
    
	
    function _showcateadmin($num,$row){
    	$this->load->database();
    	$this->db->order_by("id", "desc");
		$query=$this->db->get('category',$num,$row);
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return $query->result();
    }
    
	function _showallcate(){
    	$this->load->database();
    	$this->db->order_by("id", "desc"); 
		$query=$this->db->get('category');
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return $query->result();
    }
    
	function _showallcatebyorder(){
    	$this->load->database();
    	$this->db->order_by("count", "desc");
    	$this->db->where('active', '1'); 
		$query=$this->db->get('category');
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return $query->result();
    }
    
	function _showcatebyid($id){
    	$this->load->database();
    	$this->db->where('id', $id);
		$query=$this->db->get('category');
		if ($query->num_rows() > 0)
        {
          //foreach($query->result() as $row)
          //{
          //	return $row->Totalrow;
          //}
          return $query->result();
        } 
        return $query->result();
    }
    
    function _showcatenamebyid($id){
    	$this->load->database();
    	$this->db->where('id', $id);
		$query=$this->db->get('category');
		if ($query->num_rows() > 0)
        {
           foreach($query->result() as $row)
           {
           	 return $row->name;
           }
          
        } 
        return $query->result();
    }
     
    /*
     * Total row Category
     */
	function _totalrows($type){
    	$this->load->database();
    	if($type == 1){ 
			return $this->db->count_all('category');
    	}elseif($type == 2){
    		return $this->db->count_all('type');
    	}elseif($type==3){
    		return $this->db->count_all('content');
    	}else{
            return 0;
        }
    }
    
    function _addcate($name,$image,$active,$contype,$langid){
    	$this->load->database();
    	$data = array('name'=>$name,'image'=>$image,'active'=>$active,'contenttype'=>$contype,'lang'=>$langid);
    	$this->db->insert('category', $data); 
    }
    
 	function _updatecate($id,$name,$image,$active){
    	$this->load->database();
    	if($image == null){
    		$data = array('name'=>$name,'active'=>$active);
    	}else {
    		$data = array('name'=>$name,'image'=>$image,'active'=>$active);	
    	} 
		$this->db->where('id', $id);
		$this->db->update('category', $data); 
    }
    
	
    
    function _delcate($id){
    	$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('category');
    } 
    
    
}