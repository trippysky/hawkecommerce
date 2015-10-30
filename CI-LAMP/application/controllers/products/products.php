<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		// if(!$this->session->userdata('id'))
		// {
		// 	redirect("/admins");
		// }
		
		$results = $this->product->get_products();
		$this->load->view('products/allProducts', array("results"=>$results));
	}

	public function show_products()
	{

		$results = $this->product->get_products();

		$this->load->view('products/allProducts', array("results"=>$results));
	}

	public function create_product()
	{
		$this->product->create_product($this->input->post());
		redirect("/show_products");
		
	}

	public function add_product()
	{
		$results = $this->product->get_categories();

		$this->load->view("/products/addProducts", array("results"=>$results));
	}

	public function edit_product($id)
	{
		$results = $this->product->get_one_product($id);
		$cat_results = $this->product->get_categories();
		$this->load->view("products/editProduct", array("results" => $results, "cat_results" => $cat_results));

	}

	public function update_product()
	{
		$this->product->update_product($this->input->post());
		redirect("/show_products");
	}

	public function delete_product($id)
	{
		$this->product->delete_product($id);
		redirect("/show_products");
	}

	public function activate_product($id)
	{
		$this->product->activate_product($id);
		redirect("/show_products");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */