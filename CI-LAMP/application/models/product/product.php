<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Product extends CI_Model
	{

		
		public function get_products()
		{
			
			
			$query = "SELECT 
						products.id, products.name, products.inventory, products.qty_sold, products.image, products.active
						FROM products 				
						";
						
			return $this->db->query($query)->result_array();
			
		}

		public function create_product($post)
		{
			// var_dump($post);
			// die('model');

			$query = "INSERT INTO categories (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
			$values = array($post['new_category']);
			$this->db->query($query, $values);
			$cat_id = $this->db->insert_id();

			$query = "INSERT INTO products (name, description, price, inventory, active, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($post['name'], $post['description'], $post['price'], $post['qty'], 1, $cat_id);
			$this->db->query($query, $values);
			
		}

		public function get_one_product($id)
		{
			
	

			$query = "SELECT products.id as product_id, products.name AS product_name, products.description, products.price, products.inventory, categories.name AS category_name, categories.id as category_id FROM products JOIN categories ON products.category_id = categories.id
						WHERE products.id = ?";
			$values = $id;
			return $this->db->query($query, $values)->row_array();
		}

		public function get_categories()
		{
			$query = "SELECT id, name FROM categories";
			return $this->db->query($query)->result_array();
		}

		public function update_product($post)
		{
			// var_dump($post);
			// die('model');
			if(!empty($post['new_category']))
			{
				

				$query = "INSERT INTO categories (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
				$values = array($post['new_category']);
				$this->db->query($query, $values);
				$cat_id = $this->db->insert_id();

				$query = "UPDATE products SET name = ?, description = ?, price = ?, inventory = ?, category_id = ?, updated_at = NOW() WHERE id = ? ";
				$values = array($post['name'], $post['description'], $post['price'], $post['qty'], $cat_id, $post['product_id']);
					
				$this->db->query($query, $values);
				

			}
			else
			{

				$query = "UPDATE products SET name = ?, description = ?, price = ?, inventory = ?, category_id = ?, updated_at = NOW() WHERE id = ? ";
				$values = array($post['name'], $post['description'], $post['price'], $post['qty'], $post['category_id'], $post['product_id']);
				
				$this->db->query($query, $values);
			
			}
		}

		public function delete_product($id)
		{
			// var_dump($id);
			// die('model');
			$query = "UPDATE products SET active = 0 WHERE id = $id";
			$this->db->query($query);
		}

		public function activate_product($id)
		{
			// var_dump($id);
			// die('model');
			$query = "UPDATE products SET active = 1 WHERE id = $id";
			$this->db->query($query);
		}

	}
?>