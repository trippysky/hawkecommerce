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
			$query = "SELECT order.id as order_id, customers.first_name,
			shippingaddresses.street_1 AS shipping_street1, shippingaddresses.street_2 AS shipping_street2, shippingaddresses.city AS shipping_city, shippingaddresses.state AS shipping_state, shippingaddresses.zip AS shipping_zip,	
			billaddresses.street_1 AS billing_street1, billaddresses.street_2 AS billing_street2, billaddresses.city AS billing_city, billaddresses.state AS billing_state, billaddresses.zip AS billing_zip,
			product.id, product.name, product.price, product.qty_sold, product.active
			
			FROM orders
			JOIN product_orders ON product_orders.order_id = orders.id
			JOIN prodcuts ON product_orders.product_id = products.id
			JOIN customers ON customers.id = orders.customer_id
			JOIN billaddresses ON customers.id = billaddresses.customer_id
			JOIN shippingaddresses ON customers.id = shippingaddresses.customer_id

			WHERE orders.id = ?";

			return $this->db->query($query,$order_id)->row_array();
		}



	}
?>