<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Order extends CI_Model
	{

		public function get_orders()
		{
			

			$query = "SELECT 
						orders.id, orders.total,
						orders.created_at, orders.status,
						customers.first_name, customers.last_name, 
						billaddresses.street_1, billaddresses.street_2, billaddresses.city, billaddresses.state, billaddresses.zip
						
					FROM orders
					JOIN customers ON orders.customer_id = customers.id
					JOIN billaddresses ON billaddresses.customer_id = customers.id";

			return $this->db->query($query)->result_array();
			// $total = 0;
			// foreach ($results as $result) {
			// 	$total += ($result['qty'] * $result['price']);
			// }
			// $results['total'] = $total;
			var_dump($results);
			die('model');
			
		}


		public function update_status($status)
		{
			// var_dump($status);
			// die();

			$query = "UPDATE orders SET status = ?, updated_at = NOW() where id = ?";
			$values = array($status['orderStatus'], $status['id']);
			return $this->db->query($query, $values);
		}
		public function customer_info($order_id)
		{
			$query = "SELECT orders.id as order_id, orders.status, customers.first_name, customers.last_name,
			shipaddresses.street_1 AS shipping_street1, shipaddresses.street_2 AS shipping_street2, shipaddresses.city AS shipping_city, shipaddresses.state AS shipping_state, shipaddresses.zip AS shipping_zip,	
			billaddresses.street_1 AS billing_street1, billaddresses.street_2 AS billing_street2, billaddresses.city AS billing_city, billaddresses.state AS billing_state, billaddresses.zip AS billing_zip,
			products.id, products.name, products.price, products.qty_sold, products.active
			
			FROM orders
			JOIN order_items ON order_items.order_id = orders.id
			JOIN products ON order_items.product_id = products.id
			JOIN customers ON customers.id = orders.customer_id
			JOIN billaddresses ON customers.id = billaddresses.customer_id
			JOIN shipaddresses ON customers.id = shipaddresses.customer_id

			WHERE orders.id = ?";

			return $this->db->query($query,$order_id)->row_array();
		}

		public function order_items($order_id)
		{
			$query = "SELECT products.id, products.name, products.price, order_items.qty 
					  FROM products
					  JOIN order_items ON order_items.product_id = products.id
					  JOIN orders ON order_items.order_id = orders.id
					  WHERE orders.id = ?";
			return $this->db->query($query, $order_id)->result_array();

		}

	}
?>