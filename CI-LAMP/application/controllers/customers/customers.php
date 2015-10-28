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
		$products = $this->customer->get_products();

		$this->load->view("partials/customers/products", array(
			"products" => $products
			));
	}

	public function product_html($products)
	{
		// get product data

		$this->load->view("partials/customers/products", array(
			"products" => $products
			));
	}

	public function show_all()
	{
		redirect("/");
	}

	public function show_product($id)
	{
		// get specific product data
		$product = $this->customer->get_product($id);

		// get category id from the product
		$cat_id = $product['categories_id'];

		// get similar product data
		$similar_products = $this->customer->get_similar($id, $cat_id);

		$this->load->view("customers/oneProduct", array(
			"product" => $product,
			"similar_products" => $similar_products
			));
	}

	public function get_category_list($id)
	{
		// get product data
		$category_list = $this->customer->get_by_category($id);

		var_dump($category_list);

		// redirect("/categories/product_html", $products);

		$this->load->view('customers/categories/product_html', array(
			"products" => $category_list
			));
	}

	public function cart()
	{
		$this->load->view('customers/shoppingCart.php');
	}
	
	public function index()
	{
		$this->load->view('customers/categories');
	}
}
