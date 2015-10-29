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
		}

		public function update_status()
		{

			$this->order->update_status($this->input->post());
			redirect("/orders");
		}



	}

?>