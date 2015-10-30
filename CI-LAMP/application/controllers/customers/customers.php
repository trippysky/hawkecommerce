<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		date_default_timezone_set('US/Pacific');
	}

	public function index()
	{
		// $this->session->sess_destroy();

		$products = $this->customer->get_products();
		$this->load->view('customers/categories', array(
			"products" => $products
			));
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
			"products" => $products));
	}

	// public function product_html($products)
	// {
	// 	// get product data

	// 	$this->load->view("partials/customers/products", array(
	// 		"products" => $products
	// 		));
	// }
	
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

	public function show_all()
	{
		redirect('/');
	}


	public function get_category_list($id)
	{
		// get product data
		$category_list = $this->customer->get_by_category($id);

		// var_dump($category_list);
		// die('contr');

		// redirect("/categories/product_html", $products);

		$this->load->view('partials/customers/products', array(
			"products" => $category_list
			));
	}

	public function cart()
	{
		$this->load->view('customers/shoppingCart.php');
	}

	
	public function buy()
	{

		// die('buy');
		if(!isset($this->session->userdata['items']))
		{
			$count = 0;
			$this->session->set_userdata("items", array());
		}

		// purchase item(s)
		$product_info = $this->customer->get_product($this->input->post('id'));
		// var_dump($product_info);
		// die();
		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$prod_price = $product_info['price'];
		$name = $product_info['name'];

		$in_cart = false;
		$orig_qty = null;
		$new_qty = null;

		// set up message for successfully added to cart
		$this->session->set_userdata("message", $name . ' added to the cart!');

		// get the session data to check whether the cart already has the selected item
		$items = $this->session->userdata['items'];

		foreach($items as $key => $item)
		{
			if($item['id'] == $id){

				// keep track of original order quantity
				$orig_qty = $item['qty'];

				// remove the original order placed
				$this->session->unset_userdata(['items'][$key]);
			}
		}

		// calculate new price
		$price = number_format($prod_price * $qty,2);

		// cart items count
		$count = $qty;	

		// update new qty
		$qty += $orig_qty;

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

		// var_dump($this->session->userdata('items'));
		// die('cart');
		redirect("/");
	}

	public function update()
	{
		// store session data in a variable
		$items = $this->session->userdata['items'];

		// purchase item(s)
		$product_info = $this->customer->get_product($this->input->post('id'));

		// var_dump($product_info);
		// var_dump($this->input->post());

		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$prod_price = $product_info['price'];
		$name = $product_info['name'];

		$price = number_format($prod_price * $qty,2);

		foreach($items as $key => $item)
		{
			if($item['id'] == $id){

				// keep track of original order quantity
				$orig_qty = $item['qty'];

				// remove the original order placed
				unset($this->session->userdata['items'][$key]);
			}
		}

		$old_count = $this->session->userdata('count');

		// reduce the cart count by original item count
		$old_count -= $orig_qty;

		// increase the cart count by new item count
		$old_count += $qty;

		$item = array(
			"id" => $id,
			"qty" => $qty,
			"name" => $name,
			"price" => $price
			);

		$old_items = $this->session->userdata('items');
		$old_items[] = $item;

		$this->session->set_userdata("items", $old_items);
		$this->session->set_userdata("count", $old_count);

		redirect("/cart");
	}

	public function create()
	{
		// var_dump($this->input->post());
		// var_dump($this->session->userdata['items']);
		// var_dump($this->session->userdata['total']);

		$cust_id = null;
		$email = $this->input->post('email');
		$current_customer = $this->customer->current_customer($email);


		// deduct order quantity from product inventory

		if(!empty($current_customer))
		{
			// get customer id
			$cust_id = $current_customer['id'];
		}

		// then call create_order
		$this->customer->create_order($this->input->post(), $cust_id);

		if($this->session->flashdata('errors'))
		{
			redirect("/cart");
		}
		// set up message for successfully purchased
		$this->session->set_userdata("message", "Thank you, " . $this->session->userdata['first_name'] . '! Your order will be processed shortly.');

		// clear the session
		// $this->session->sess_destroy();

		// use unset to maintain the message for redirect
		$this->session->unset_userdata('items');
		$this->session->unset_userdata('count');
		$this->session->unset_userdata('total');

		redirect("/");
	}

	public function destroy($id)
	{

		$items = $this->session->userdata['items'];
		$new_count = null;

		foreach($items as $key => $item)
		{
			if($item['id'] == $id){
				$new_count = $this->session->userdata["count"];
				$new_count -= $item['qty'];
				unset($this->session->userdata['items'][$key]);
				$this->session->set_userdata('count', $new_count);
			}
		}
		$new_items = $this->session->userdata['items'];
		$this->session->set_userdata('items', $new_items);

		// add check if userdata doesn't exist redirect to index
		if($this->session->userdata('items') == null)
		{
			redirect("/");
		}
		else
		{
			redirect('cart', array(
				$this->session->userdata['items']
				));
		}
	}
}

?>
