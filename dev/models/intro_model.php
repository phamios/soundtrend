<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class intro_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  
    function _showintro($langid){
    	$this->load->database();
    	$this->db->order_by("id", "desc");
    	$this->db->where(array('active'=>1,'langid'=>$langid));
        $this->db->limit(3);
	$query=$this->db->get('intro');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        } 
        return $query->result();
    }
    
    
    
    function _showallintro(){
    	$this->load->database();
    	$this->db->order_by("id", "desc"); 
        $query=$this->db->get('intro');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
	
    
    
    function _showintrobyid($id){
    	$this->load->database();
    	$this->db->where('id', $id);
        $query=$this->db->get('intro');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
	 
    /*
     * Return Link
     */
    function _returnLink($id){
    	$this->load->database();
    	$this->db->where('id', $id);
	$query=$this->db->get('intro');
	if ($query->num_rows() > 0)
        {
          foreach($query->result() as $row)
          {
          	return $row->link;
          }
          
        } 
        return null;
    }
    
    /*
     * Total row Content
     */
    function _totalrows(){
    	$this->load->database(); 
        return $this->db->count_all('intro');
    }
    
    function _addintro($title,$des,$images,$active,$langid){
    	$this->load->database();
    	$data = array(
            'title'=>$title,
            'des'=>$des,
            'images'=>$images,
            'active'=>$active,
            'langid'=>$langid
         );
    	$this->db->insert('intro', $data); 
    }
    
    function _updateintro($id,$title,$des,$images,$active,$langid){
    	$this->load->database();
    	if($images == null){
    		$data = array(
                'title'=>$title,
                'des'=>$des,
                'active'=>$active,
                'langid'=>$langid
                );
    	}else {
    		$data = array(
                'title'=>$title,
                'des'=>$des,
                'images'=>$images,
                'active'=>$active,
                'langid'=>$langid
            );
    	}
    	
        $this->db->where('id', $id);
        $this->db->update('intro', $data); 
    }
    
    function _delintro($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('intro');
    } 
    
    
}