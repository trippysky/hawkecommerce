<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		
			
		$this->load->view('admins/adminLogin');
	}

	public function register()
	{
		
		$this->admin->add_user($this->input->post());
		redirect("/admins");
	}

	public function login()
	{		
		$this->admin->login($this->input->post());

		if($this->admin->login($this->input->post()))
		{
			
			// true: user found

			redirect("/orders");
		}
		else{
			// false: user not found
			redirect("/admins/admins/index");
		}

	}

	public function logout()
	{
		// var_dump($this->session->userdata('id'));
		// die('logout');
		$this->session->sess_destroy();
		redirect("/admins");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */