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

	public function get_products()
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id
					ORDER BY price DESC";

		return $this->db->query($query)->result_array();

	}

	public function get_product($id)
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category, categories.id as categories_id FROM products
					JOIN categories
					ON products.category_id = categories.id
					WHERE products.id = ?";
		$values = $id;

		return $this->db->query($query, $values)->row_array();

	}
	public function get_by_category($id)
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id 
					WHERE products.category_id = ?
					LIMIT 15";
		$values = $id;

		return $this->db->query($query, $values)->result_array();

	}

	public function get_similar($id, $cat_id)
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id
					WHERE categories.id = ? AND products.id != ?
					LIMIT 6";
		$values = array($cat_id, $id);

		return $this->db->query($query, $values)->result_array();
	}

	public function get_categories()
	{
		$query = "SELECT categories.id, categories.name, count(*) as counter FROM categories
					JOIN products
					ON categories.id = products.category_id
					GROUP BY name
					ORDER BY counter DESC";

		return $this->db->query($query)->result_array();

	}
}




