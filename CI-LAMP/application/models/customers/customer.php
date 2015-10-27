<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}
	// public function index()
	// {
	// 	// get product data
	// 	$product_list = $this->customer->get_products();

	// 	$this->load->view('customers/categories');
	// }

	public function get_init_products()
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category FROM products
					JOIN product_categories
					ON products.id = product_categories.product_id
					JOIN categories
					ON product_categories.category_id = categories.id";

		return $this->db->query($query)->result_array();

	}
}




