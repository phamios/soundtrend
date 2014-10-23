<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library("soap");
	}
	public function index()
	{
 
		$wsdl="http://localhost/core2/index.php/ws_core?wsdl"; 
		$client=new nusoap_client($wsdl, array('wsdl'));
		//$param=array('int1'=>'40', 'int2'=>'10','user'=>'test','pass'=>'test');
		//echo $client->call('ws_add', $param); 
		echo "<br/>"; 
		$param=array('int3'=>'20', 'int4'=>'10');
		echo $client->call('ws_dev', $param); 
		echo $client->getError();
		//$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */