<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Banner_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
    
    function _showbanner(){
    	$this->load->database();
    	$this->db->order_by("id", "desc");  
        $query=$this->db->get('banner');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _addbanner($banner,$position,$active,$link){
    	$this->load->database();
    	$data = array( 
            'banner'=>$banner,
            'position'=>$position,
            'active'=>$active,
            'link'=>$link
            );
    	$this->db->insert('banner', $data); 
    }
    
   
    function _updatebanner($id,$banner,$position,$active,$link){
    	$this->load->database();
        $data = array( 
            'banner'=>$banner,
            'position'=>$position,
            'active'=>$active,
            'link'=>$link
            );
        $this->db->where('id', $id);
        $this->db->update('banner', $data); 
    }
    
    function showimagebottom($num,$offset){
    	$this->load->database();
		$this->db->order_by("id", "desc"); 
		$query=$this->db->get('tbimageslidebottom',$num,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
    }
    
    function showimagebottomlimit(){
    	$this->load->database();
		$this->db->order_by("id", "desc");  
		$query=$this->db->get('tbimageslidebottom');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
    }
    
	function addimagesbottom($images){
		$this->load->database();
    	$data = array( 
            'images'=>$images,
            'active'=>1
            );
    	$this->db->insert('tbimageslidebottom', $data); 
	}
	
	function unactiveimagesbottom($id){
    	$this->load->database();
        $data = array( 
            'active'=>0
            );
        $this->db->where('id', $id);
        $this->db->update('tbimageslidebottom', $data); 
    }
 	
    function _delimagebottom($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbimageslidebottom');
    }
    
    function totalimagebottom(){
    	$this->load->database();
		return $this->db->count_all('tbimageslidebottom');
    }
    
    function _delbanner($id){
    	$this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('banner');
    }
    
}