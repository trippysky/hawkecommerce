<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
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

		// var_dump($products);
		// die('index_html');

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

	
	public function buy()
	{
		if(!isset($this->session->userdata['items']))
		{
			$count = 0;
			$this->session->set_userdata("items", array());
		}
		// purchase item(s)
		$product_info = $this->customer->get_product($this->input->post('id'));

		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$prod_price = $product_info['price'];
		$name = $product_info['name'];

		$price = $prod_price * $qty;

		// cart items count
		$count++;

		$item = array(
			"id" => $id,
			"qty" => $qty,
			"name" => $name,
			"price" => $price
			);

		$old_count = $this->session->userdata('count');
		$old_count += $count;

		$old_items = $this->session->userdata('items');
		$old_items[] = $item;


		$this->session->set_userdata("items", $old_items);
		$this->session->set_userdata("count", $old_count);

		redirect("/");
	}

	public function update()
	{

		// not sure where this should go just yet
		if(!isset($this->session->userdata['items']))
		{
			$count = 0;
			$this->session->set_userdata("items", array());
		}
		// purchase item(s)
		$product_info = $this->customer->get_product($this->input->post('id'));

		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$prod_price = $product_info['price'];
		$name = $product_info['name'];

		$price = $prod_price * $qty;

		// cart items count
		$count++;

		$item = array(
			"id" => $id,
			"qty" => $qty,
			"name" => $name,
			"price" => $price
			);

		$old_count = $this->session->userdata('count');
		$old_count += $count;

		$old_items = $this->session->userdata('items');
		$old_items[] = $item;


		$this->session->set_userdata("items", $old_items);
		$this->session->set_userdata("count", $old_count);

		redirect("/");
	}

	public function destroy($id)
	{

		$items = $this->session->userdata['items'];

		var_dump($this->session->userdata['count']);

		foreach($items as $key => $item)
		{
			if($item['id'] == $id){
				echo "found id " . $id . " in key " . $key;
				unset($this->session->userdata['items'][$key]);
				$new_count = $this->session->userdata["count"];
				$new_count--;

			}
		}
		$this->session->set_userdata('count', $new_count);
		$new_items = $this->session->userdata['items'];
		$this->session->set_userdata('items', $new_items);
		var_dump($this->session->userdata['count']);

		$this->load->view('cart', array(
			$this->session->userdata['items']
			));
	}

	// public function show()
	// {
	// 	$this->load->view('cart');
	// }




	public function index()
	{
		$this->load->view('customers/categories');
	}
}
