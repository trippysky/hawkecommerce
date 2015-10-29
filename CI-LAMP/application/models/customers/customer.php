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

	public function create_order($post, $cust_id)
	{
		// create a customer in the customers table.
		if($cust_id == null)
		{
			$query = "INSERT INTO customers (first_name, last_name, email, created_at, updated_at) 
						VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($post['first_name'], $post['last_name'], $post['email']);

			$this->db->query($query, $values);

			// get customer id
			$customer_id = $this->db->insert_id();

			// add shipping address
			$query = "INSERT INTO shipaddresses (customer_id, street_1, street_2, city, state, zip, created_at, updated_at) 
						VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($customer_id, $post['address'], $post['address2'], $post['city'], $post['state'], $post['zipcode']);

			$this->db->query($query, $values);

			// add billing address
			$query = "INSERT INTO billaddresses (customer_id, street_1, street_2, city, state, zip, created_at, updated_at) 
						VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($customer_id, $post['baddress'], $post['baddress2'], $post['bcity'], $post['bstate'], $post['bzipcode']);

			$this->db->query($query, $values);
		}

		// create an order in the orders table
		$query = "INSERT INTO orders (customer_id, status, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array($customer_id, 'inProcess');

		$this->db->query($query, $values);

		// get new order id
		$order_id = $this->db->insert_id();

		// add customer id and order id to order_items table
		foreach($this->session->userdata['items'] as $item)
		{
			$query = "INSERT INTO order_items (order_id, product_id, qty, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($order_id, $item['id'], $item['qty']);

			$this->db->query($query, $values);
		}
	}

	public function current_customer($post)
	{
		// verify customer isn't already in the db (no login at this time)
			// if email matches already customer
		$query = "SELECT id, email FROM customers WHERE email = ?";
		$values = $post['email'];

		return $this->db->query($query, $values)->row_array();
	}

}




