<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->load->view('adminLogin');
	}

	public function register()
	{
		
		$this->admin->add_user($this->input->post());
		redirect("/admins");
	}

	public function login()
	{		
		$this->admin->login($this->input->post());

		if($this->admin->login($this->input->post())){
			// var_dump($this->session->userdata("id"));
			// die('logged in');
			// true: user found
			redirect("/trips");
		}
		else{
			// false: user not found
			redirect("/");
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */