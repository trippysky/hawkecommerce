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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */