<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url_helper');

	}

	public function index() 
	{
		$this->load->helper(array('form'));
		$this->load->view('users/register');
	}
}
