<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/Mailgun/vendor/autoload.php';
use Mailgun\Mailgun;
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */ 
	public function index()
	{
		$this->load->library('encrypt');
		 
		

		$mg = new Mailgun("key-03bbdd374175cab763318e141fb293ec");
		$domain = "sandbox750e37e111ff4d03a61fe980e1f94dee.mailgun.org";
		
		# Now, compose and send your message.
		$mg->sendMessage($domain, array('from'    => 'bob@example.com', 
										'to'      => 'anoopkp06@gmail.com', 
										'subject' => 'The PHP SDK is awesome!', 
										'text'    => 'It is so simple to send a message.'));
								
	 
    //print_r($result);
    
		$this->load->view('welcome_message');
	}
}
