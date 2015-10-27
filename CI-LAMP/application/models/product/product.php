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
			$result = $this->db->query($query)->result_array();
			var_dump($result);
			die();
		}

	}
?>