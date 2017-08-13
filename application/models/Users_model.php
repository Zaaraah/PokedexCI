<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

	public function login($username, $password)
	{
			   $this -> db -> select('id, username, password');
			   $this -> db -> from('users');
			   $this -> db -> where('username', $username);
			   $this -> db -> where('password', MD5($password));
			   $this -> db -> limit(1);
			 
			   $query = $this -> db -> get();
			 
			   if($query -> num_rows() == 1)
			   {
			     return $query->result();
			   }
			   else
			   {
			     return false;
			   }
	}

	public function signup($data)
	{
		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) 
		{

			// Query to insert data in database
			$this->db->insert('users', $data);
			if ($this->db->affected_rows() > 0) 
			{
			return true;
			}

		}
		else 
		{
		return false;
		}
	}
}