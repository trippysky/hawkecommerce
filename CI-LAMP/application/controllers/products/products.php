<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		$results = $this->product->get_orders();
		$this->load->view('products/dashOrders');
	}

	public function get_all_orders()
	{
		$this->product->get_orders();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */