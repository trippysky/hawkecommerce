<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Product extends CI_Model
	{

		public function get_orders()
		{
			

			$query = "SELECT 
						orders.id, 
						customers.first_name, customers.last_name, 
						orders.created_at, orders.status,
						billaddresses.street_1, billaddresses.street_2, billaddresses.city, billaddresses.state, billaddresses.zip,
						order_items.qty,
						products.price
					FROM orders
					JOIN customers ON orders.customer_id = customers.id
					JOIN billaddresses ON billaddresses.customer_id = customers.id
					JOIN order_items ON order_items.order_id = orders.id
					JOIN products ON order_items.product_id = products.id";
			return $this->db->query($query)->result_array();
			
		}

		public function get_products()
		{
			

			$query = "SELECT 
						products.id, products.name, products.inventory, products.qty_sold
						FROM products";
						
			var_dump( $this->db->query($query)->result_array());
			die();
			
		}

		public function create_product($post)
		{
			// var_dump($post);
			// die('model');


			$query = "INSERT INTO products (name, description, price, inventory, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
			$values = array($post['name'], $post['description'], $post['price'], $post['qty']);
			$this->db->query($query, $values);
			$prod_id = $this->db->insert_id();
			

			$query = "INSERT INTO categories (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
			$values = array($post['new_category']);
			$this->db->query($query, $values);
			$cat_id = $this->db->insert_id();

			$query = "INSERT INTO product_categories (category_id, product_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
			$values = "$cat_id, $prod_id";
			$this->db->query($query,$values);



			
		}

	}
?>