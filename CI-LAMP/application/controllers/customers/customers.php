<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index_html()
	{
		// get product data
		$product_list = $this->customer->get_init_products();

		 $this->load->view("partials/customers/products", array(
			"product_list" => $product_list
			));
	}

	public function index()
	{
		// get product data
		$product_list = $this->customer->get_init_products();

		$this->load->view('customers/categories');
	}
}
