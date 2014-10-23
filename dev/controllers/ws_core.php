<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws_core extends CI_Controller {
	

	function __construct()
	{
		parent::__construct();
		$this->load->library("soap");  
		$ns = $this->config->item('namespace');
		$server = new soap_server();
		$server->configureWSDL('Webservices_KM',$ns);
		$server->wsdl->schemaTargetNamespace=$ns;
		
		$server->register('ws_add',
		    array('int1' => 'xsd:integer','int2' => 'xsd:integer','user'=> 'xsd:string','pass'=> 'xsd:string'),
		    array('total' => 'xsd:integer'),  
		    $ns,                                                  
		    "$ns#ws_add", 
		    'rpc',                        
		    'encoded',                    
		    'adds two integer values and returns the result'      
		    );
		    
		$server->register('ws_dev',
		    array('int3' => 'xsd:integer','int4' => 'xsd:integer'),
		    array('total' => 'xsd:integer'),  
		    $ns,                                                  
		    "$ns#ws_dev", 
		    'rpc',                        
		    'encoded',                    
		    'Devision two integer values and returns the result'      
		    );
		    
		function ws_add($int1, $int2,$user,$pass){
			//return new soapval('return','xsd:integer',$this->add($int1, $int2,$user,$pass));
			return new soapval('return','xsd:integer',Ws_core::add($int1, $int2, $user, $pass));
		}
		
		function ws_dev($int3, $int4){
			//return new soapval('return','xsd:integer',$this->add($int1, $int2,$user,$pass));
			return new soapval('return','xsd:integer',Ws_core::dev($int3, $int4));
		}
		
		if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
		$server->service($HTTP_RAW_POST_DATA);
		//$this->load->view('welcome_message');
	}
	
	public function index()
	{
		
		
	}
	
	function add($int1, $int2,$user,$pass) {
		if(($user =='test') && ($pass=='test') ){
	    	return $int1 + $int2;
		}else {
			return -1;
		}
	}
	
	function dev($int3, $int4) { 
	    	return $int3 - $int4; 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */