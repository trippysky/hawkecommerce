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
		$this->load->view('products/dashOrders', array("results"=>$results));
	}

	public function show_products()
	{
		die('here');
		$results = $this->product->get_products();
		$this->load->view('products/allProducts', array("results"=>$results));
	}

	public function add_product()
	{
		$this->product->create_product($this->input->post());
		
	}

	public function edit_product()
	{
		$this->load->view("editProducts");

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */