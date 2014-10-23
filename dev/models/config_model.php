<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /* 
     * Return Category List 
     * load by Limit
     * 
     */
    function _showconfig(){
    	$this->load->database();
    	$this->db->where('id',1); 
		$query=$this->db->get('tbconfigsys');
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
	function _showconfigbyid($id){
    	$this->load->database();
    	$this->db->where('id',$id); 
		$query=$this->db->get('banner');
		if ($query->num_rows() > 0)
        {
          return $query->result();
        } 
        return $query->result();
    }
    
    /*
     * Total row Banner
     */
	function _totalrows(){
    	$this->load->database();
    	return $this->db->count_all('banner');
    }
    /*
     * Add Banner
     */
    function _addposition($banner,$position,$active){
    	$this->load->database();
    	$data = array('banner'=>$banner,'position'=>$position,'active'=>$active);
    	$this->db->insert('banner', $data); 
    }
    /*
     * Update Banner
     */
 	function _updatebanner($id,$banner,$position,$active){
    	$this->load->database();
    	if($banner == null){
    		$data = array('position'=>$position,'active'=>$active);
    	}else {
    		$data = array('position'=>$position,'banner'=>$banner,'active'=>$active);	
    	} 
		$this->db->where('id', $id);
		$this->db->update('banner', $data); 
    }
    /*
     * Delete Banner
     */
    function _delbanner($id=0){
    	$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('banner');
    } 
    
 
    
 	function addconfig($hotnewcount,$sitename,$newmerchantcount,$artcilemerchantcount,$commentmerchantcount,$meta,$des){
    	$this->load->database();
    	$data = array(
    		'hotnewcount'=>$hotnewcount,
    		'sitename'=>$sitename,
    		'newmerchantcount'=>$newmerchantcount,
    		'artcilemerchantcount'=>$artcilemerchantcount,
    		'commentmerchantcount'=>$commentmerchantcount,
    		'meta' => $meta,
    		'des'=>$des
    	);
    	$this->db->insert('tbconfigsys', $data); 
    }
    
	function update($id,$hotnewcount,$sitename,$newmerchantcount,$artcilemerchantcount,$commentmerchantcount,$meta,$des){
    	$this->load->database();
    	$data = array(
    		'hotnewcount'=>$hotnewcount,
    		'sitename'=>$sitename,
    		'newmerchantcount'=>$newmerchantcount,
    		'artcilemerchantcount'=>$artcilemerchantcount,
    		'commentmerchantcount'=>$commentmerchantcount,
    		'meta' => $meta,
    		'des'=>$des
    	);
    	$this->db->where('id', $id);
		$this->db->update('tbconfigsys', $data); 
    }
    
}