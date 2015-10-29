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

		public function login($post)
		{
			// var_dump($post);
			// die('model');

			$query = "SELECT id FROM admins WHERE email = ? AND password = ?";
			$values = array($post["email"], $post["password"]);
			$user = $this->db->query($query,$values)->row_array();
			
			if(!empty($user)){
				// user found
				$resultdata = array('id' => $user["id"]);
				// var_dump($resultdata);
				// die();
				$this->session->set_userdata($resultdata);

				return true;
			}
			else{
				// no user found
				$this->session->set_flashdata("errors", "<p>Invalid credentials.</p>");
				return false;
			}
		}


	}
?>