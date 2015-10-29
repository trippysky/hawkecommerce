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


	}
?>