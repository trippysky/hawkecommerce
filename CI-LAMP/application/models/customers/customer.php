<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function get_products()
	{
		$query = "SELECT products.id, products.name, description, price, inventory, qty_sold, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id
					WHERE active
					ORDER BY price DESC";

		return $this->db->query($query)->result_array();
	}

	public function get_products_popular()
	{
		// die('called me');
		$query = "SELECT products.id, products.name, description, price, inventory, qty_sold, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id
					WHERE active
					ORDER BY qty_sold DESC";

		return $this->db->query($query)->result_array();
	}

	public function get_product($id)
	{
		$query = "SELECT products.id, products.name, description, price, inventory, qty_sold, image, categories.name as category, categories.id as categories_id FROM products
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
					AND active
					LIMIT 15";
		$values = $id;

		return $this->db->query($query, $values)->result_array();

	}

	public function get_similar($id, $cat_id)
	{
		$query = "SELECT products.id, products.name, description, price, inventory, image, categories.name as category FROM products
					JOIN categories
					ON products.category_id = categories.id
					WHERE categories.id = ? AND products.id != ? AND active
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
		// var_dump($post);
		// die();

			$this->form_validation->set_rules("email", "email", "max_length[45]|valid_email|trim|required");
			$this->form_validation->set_rules("first_name", "shipping first name", "max_length[45]|trim|required");
			$this->form_validation->set_rules("last_name", "shipping last name", "max_length[45]|trim|required");			
			$this->form_validation->set_rules("address", "shipping address", "trim|required");
			$this->form_validation->set_rules("city", "shipping city", "trim|required");
			$this->form_validation->set_rules("state", "shipping state", "trim|required|max_length[2]");
			$this->form_validation->set_rules("zipcode", "shipping zipcode", "trim|required");
			$this->form_validation->set_rules("bfirst_name", " billing first name", "max_length[45]|trim|required");
			$this->form_validation->set_rules("last_name", "billing last name", "max_length[45]|trim|required");
			$this->form_validation->set_rules("baddress", "billing address", "trim|required");
			$this->form_validation->set_rules("bcity", "billing city", "trim|required");
			$this->form_validation->set_rules("bstate", "billing state", "trim|required");
			$this->form_validation->set_rules("bzipcode", "billing zipcode", "trim|required");
			$this->form_validation->set_rules("ccn", "credit card number", "trim|required");
			$this->form_validation->set_rules("sec_code", "security code", "min_length[3]|max_length[4]|required|trim");
			
				
			if($this->form_validation->run() === FALSE)
			{
				
			    $this->session->set_flashdata('errors', validation_errors());
			    return false;

			}
			else
			{
		// create a customer in the customers table.
		if($cust_id == null)
		{
			$query = "INSERT INTO customers (first_name, last_name, email, created_at, updated_at) 
						VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($post['first_name'], $post['last_name'], $post['email']);

			$this->db->query($query, $values);

			// get customer id
			$cust_id = $this->db->insert_id();

			// add shipping address
			$query = "INSERT INTO shipaddresses (customer_id, street_1, street_2, city, state, zip, created_at, updated_at) 
						VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($cust_id, $post['address'], $post['address2'], $post['city'], $post['state'], $post['zipcode']);

			$this->db->query($query, $values);

			// add billing address
			$query = "INSERT INTO billaddresses (customer_id, street_1, street_2, city, state, zip, created_at, updated_at) 
						VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($cust_id, $post['baddress'], $post['baddress2'], $post['bcity'], $post['bstate'], $post['bzipcode']);

			$this->db->query($query, $values);
		}

		// create an order in the orders table

		$query = "INSERT INTO orders (customer_id, status, total, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($cust_id, 'inProcess', $this->session->userdata['total']);

		$this->db->query($query, $values);

		// get new order id
		$order_id = $this->db->insert_id();

		foreach($this->session->userdata['items'] as $item)
		{
			// add customer id and order id to order_items table
			$query = "INSERT INTO order_items (order_id, product_id, qty, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
			$values = array($order_id, $item['id'], $item['qty']);

			$this->db->query($query, $values);

			// get current inventory and quantity for product
			$query = "SELECT id, inventory, qty_sold, active FROM products WHERE id = ?";
			$values = $item['id'];

			$prod_info = $this->db->query($query, $values)->row_array();

			// store new inventory, new quantity sold and active
			$new_inv = ($prod_info['inventory'] - $item['qty']);
			$new_sold = ($prod_info['qty_sold'] + $item['qty']);

				$query = "UPDATE products SET inventory = ?, qty_sold = ? WHERE id = ?";
				$values = array($new_inv, $new_sold, $item['id']);			

			$this->db->query($query, $values);
		}
		return true;
	}}

	public function current_customer($email)
	{
		// verify customer isn't already in the db (no login at this time)
			// if email matches already customer
		$query = "SELECT id, email FROM customers WHERE email = ?";
		$values = $email;

		return $this->db->query($query, $values)->row_array();
	}
}
