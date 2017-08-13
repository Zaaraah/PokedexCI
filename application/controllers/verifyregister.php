<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('users_model','',TRUE);
 }

 function index()
 {
    //This method will have the credentials validation
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('users/register');
    }
    else
    {
      $pw = $this->input->post('password');
      $password = MD5($pw);
      $data = array(
      'username' => $this -> input -> post('username'),
      'email' => $this -> input -> post('email'),
      'password' => $password
      );
      
      $result = $this->users_model->signup($data);
      if ($result == TRUE) {
        $data['message_display'] = 'Registration successful!';
        $this->load->view('users/login', $data);
      } else {
      $data['message_display'] = 'Username already exists.';
      $this->load->view('users/register', $data);
      }
    }
 }
}
?>