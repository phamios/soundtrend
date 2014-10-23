<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
    function _showmenu($active){
    	$this->load->database();
        if($active <> 0){
           $this->db->where(array('active'=>1));
        }
        $query=$this->db->get('menu');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function getchildmenu($cateid){
    	$this->load->database();
    	$this->db->where(array('active'=>1,'root'=>$cateid));
		$query=$this->db->get('menu');
		if ($query->num_rows() > 0)
        {
	    	return $query->result();
        }  
        return $query->result();
    }
    function _showmenubyorder($langid){
    	$this->load->database(); 
        $this->db->where(array('active'=>1,'menulang'=>$langid)); 
        $this->db->order_by("order", "asc"); 
        $query=$this->db->get('menu');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    function _showmenubyid($id){
       $this->load->database();
        $this->db->where(array('id'=>$id));
        $query=$this->db->get('menu',$num,$row);
        if ($query->num_rows() > 0)
        {
            return $query->result();
        } 
        return $query->result();
    }
    
    
    
    function _displaymenu(){
        $this->load->database();
    	$this->db->order_by("order", "desc");  
        $query=$this->db->get('menu');
        if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    function checkvalidate($name){
        $this->load->database();
         
    	$this->db->where(array('menuname'=>$name));  
        $query=$this->db->get('menu');
        if ($query->num_rows() > 0)
        {
          return 1;
        } 
        return 0;
    }
    function _addmenu($lang,$name,$link,$url,$active,$order){
    	$this->load->database();
        if($this->checkvalidate($name) == 1){
            $name = $name.'-';
        }else {
            $name = $name;
        }
       
        $data = array(
            'menulang' => $lang,
            'menuname'=>$name,
            'menulink'=>$link,
            'menuurl'=>$url,
            'active'=>$active,
            'order' => $order
            );
    	$this->db->insert('menu', $data); 
    	
    }
    
    function _getlastid(){
        $this->load->database(); 
    	$this->db->select_max('id');
        $query = $this->db->get('menu');
    	foreach($query->result() as $row)
          {
          	return $row->id;
          }
        return 0;
    }
    
    
    
    function _updatemenu($id,$lang,$name,$link,$url,$active,$order){
    	$this->load->database();
         if($this->checkvalidate($name) == 1){
            $name = $name.random();
        }else {
            $name = $name;
        }
        $data = array(
            'menulang' => $lang,
            'menuname'=>$name,
            'menulink'=>$link,
            'menuurl'=>$url,
            'active'=>$active,
            'order' => $order);
       
        $this->db->where('id', $id);
        $this->db->update('menu', $data); 
        
    }
    
	
    
    function _delmenu($id){
    	$this->load->database();
        $this->db->where(array('id'=>$id));
        $this->db->delete('menu');
    }
  
    
    
}