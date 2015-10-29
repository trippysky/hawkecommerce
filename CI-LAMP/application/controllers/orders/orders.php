<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	
		public function index()
		{
			$results = $this->order->get_orders();
			// var_dump($results);
			// die('ctrl');
			$this->load->view('/orders/dashOrders', array('results'=>$results));
		}

		public function update_status()
		{
			var_dump($this->input->post());
			die();
			$this->order->update_status($this->input->post());
		}



	}

?>