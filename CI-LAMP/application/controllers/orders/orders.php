<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	
		public function index()
		{
			// var_dump($this->session->userdata('id'));
			// die();
			if(!$this->session->userdata('id'))
			{
				redirect("/admins");
			}

			$results = $this->order->get_orders();
			$this->load->view('/orders/dashOrders', array('results'=>$results));
			// $orders = $this->order->customer_order();

			// $this->load->view("orders", array(

			// "customer_order"=> $orders,
			// "customer_order"=> $orders,
			// "customer_order"=> $orders,
			// "customer_order"=> $orders,


			

		}

		public function update_status()
		{

			$this->order->update_status($this->input->post());
			redirect("/orders");
		}

		public function order_by_id($order_id)
		{
			$this->load->model('order');
			$customer_info = $this->order->customer_info($order_id);
			$this->load->view('/orders/show_orders', array("customer_info" => $customer_info));


			// $orders = array(
			// 	"order_id"=> ,
			// 	"shipping_name"=> ,
			// 	"shipping_address1"=> $order_id,
			// 	"shipping_address2"=> $order_id,
			// 	"shipping_address_city"=> $order_id,
			// 	"shipping_address_state"=> $order_id,
			// 	"shipping_address_zip"=> $order_id,
				
			// 	"billing_address_name"=> $order_id,
			// 	"billing_address1"=> $order_id,
			// 	"billing_address2"=> $order_id,
			// 	"billing_address_city"=> $order_id,
			// 	"billing_address_state"=> $order_id,
			// 	"billing_address_zip"=> $order_id,
				
			// 	"product_id"=>,
			// 	"product_title"=>,
			// 	"product_price"=>,
			// 	"product_quantity"=>,
			// 	"product_total"=>,

			// 	"order_status"=>,


			// 	)

		}



	}

?>