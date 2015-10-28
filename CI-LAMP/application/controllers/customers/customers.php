<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		date_default_timezone_set('US/Pacific');
	}

	public function category_html()
	{
		// get product data
		$categories_list = $this->customer->get_categories();

		// var_dump($categories_list);
		// die('category_html');

		 $this->load->view("partials/customers/category_list", array(
			"categories_list" => $categories_list
			));
	}

	public function index_html()
	{
		// get product data
		$product_list = $this->customer->get_products();

		 $this->load->view("partials/customers/products", array(
			"product_list" => $product_list
			));
	}

	public function show_all()
	{
		redirect("/");
	}

	public function show_product($id)
	{
		$product = $this->customer->get_product($id);

		$this->load->view("customers/oneProduct", array(
			"product" => $product
			));
	}

	public function get_category_list($id)
	{
		// get product data
		$category_list = $this->customer->get_by_category($id);

		var_dump($category_list);

		$this->load->view('customers/categories', array(
			"product_list" => $category_list
			));
	}

	public function index()
	{
		// get product data
		$product_list = $this->customer->get_products();

		$this->load->view('customers/categories', array(
			"product_list" => $product_list
			));
	}
}
