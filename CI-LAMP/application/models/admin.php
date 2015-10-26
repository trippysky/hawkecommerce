<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Admin extends CI_Model
	{

		public function add_user($post)
		{
		// 	var_dump($this->input->post());
		// die('model');
		$query = "INSERT INTO admins (email, password, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array($post['email'], $post['password']);
		$this->db->query($query, $values);
		}


	}
?>