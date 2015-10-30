<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css"/>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script>
		$(document).ready(function(){
			$('#checkbox').change(function(){
				if($('#checkbox').is(':checked'))
				{
					//populate the billing address from the shipping address
					console.log('same as shipping');
					$temp = $('input:text[name="first_name"]').val();
					$('input:text[name="bfirst_name"]').attr("value", $temp);
					$temp = $('input:text[name="last_name"]').val();
					$('input:text[name="blast_name"]').attr("value", $temp);
					$temp = $('input:text[name="address"]').val();
					$('input:text[name="baddress"]').attr("value", $temp);
					$temp = $('input:text[name="address2"]').val();
					$('input:text[name="baddress2"]').attr("value", $temp);
					$temp = $('input:text[name="city"]').val();
					$('input:text[name="bcity"]').attr("value", $temp);
					$temp = $('input:text[name="state"]').val();
					$('input:text[name="bstate"]').attr("value", $temp);
					$temp = $('input:text[name="zipcode"]').val();
					$('input:text[name="bzipcode"]').attr("value", $temp);
				};
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<div id="navbar" class="navbar">
			<h2 class="alignleft">Hawk eCommerce</h2>
			<p class="alignright">Shopping Cart (
					<?php if($this->session->userdata('count') == 0)
					{ ?>
						empty
					<?php } else { ?>
						<?= $this->session->userdata('count'); ?>
						<?php }?>
						)</p>
		</div>
		<div style="clear: both;"></div>
		<div class="order">
			<form class="table" action="update" method="post">
				<table>
					<thead>
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($this->session->userdata['items']) && $this->session->userdata["items"] !== null){
							$total = 0;
							foreach($this->session->userdata['items'] as $item)
							{
								// var_dump($item['price']);
							 ?>
								<tr>
									<td><?= $item['name']; ?></td>
									<td>$ <?= $item['price']/$item['qty']; ?></td>
									<td align="center">
										<input type="hidden" name="id" value="<?= $item['id']; ?>"/>
										<input type="number" name="qty" min="1" max="3" placeholder="<?= $item['qty']; ?>"/>
										<input type="submit" class="update" value="update"/>
										<a href="delete/<?= $item['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
									<td>$ <?= $item['price']; ?></td>
								</tr>
							<?php $total += $item['price']; ?>
							<?php } ?>
						<?php }
								// store total to session data
							 	$this->session->set_userdata('total', $total);
						 	?>
					</tbody>
				</table>
			</form>
			<p class="alignright">Total: $ <?= $total ?></p>
			<div style="clear: both;"></div>
			<p class="alignright"><a href="/"><button class="shopping">Continue Shopping</button></a></p>
			<div style="clear: both;"></div>
		</div>
		<div class="customer_info">
			<div class="shipping">
				<h3>Shipping Information</h3>
				<?= $this->session->flashdata('errors') ?>
				<form action="/order/create" method="post">
					<p>
						<label class="space">Email:</label>
						<input type="text" name="email"/>
					</p>
					<p>
						<label class="space">First Name:</label>
						<input type="text" name="first_name"/>
					</p>
					<p>
						<label>Last Name:</label>
						<input type="text" name="last_name"/>
					</p>
					<p>
						<label>Address:</label>
						<input type="text" name="address"/>
					</p>
					<p>
						<label>Address 2:</label>
						<input type="text" name="address2"/>
					</p>
					<p>
						<label>City:</label>
						<input type="text" name="city"/>
					</p>
					<p>
						<label>State:</label>
						<input type="text" name="state"/>
					</p>
					<p>
						<label>Zipcode:</label>
						<input type="text" name="zipcode"/>
					</p>
					<!-- find another way to tag this element -->
 				<h3>Billing Information</h3>
					<input type="checkbox" name="sameas" id="checkbox"/> Same as Shipping
					<p>
						<label>First Name:</label>
						<input type="text" name="bfirst_name"/>
					</p>
					<p>
						<label>Last Name:</label>
						<input type="text" name="blast_name"/>
					</p>
					<p>
						<label>Address:</label>
						<input type="text" name="baddress"/>
					</p>
					<p>
						<label>Address 2:</label>
						<input type="text" name="baddress2"/>
					</p>
					<p>
						<label>City:</label>
						<input type="text" name="bcity"/>
					</p>
					<p>
						<label>State:</label>
						<input type="text" name="bstate"/>
					</p>
					<p>
						<label>Zipcode:</label>
						<input type="text" name="bzipcode"/>
					</p>
					<p class="ccn_info">
						<label>Card:</label>
						<input type="text" name="ccn"/>
					</p>
					<p>
						<label>Security Code:</label>
						<input type="text" name="sec_code"/>
					</p>
					<p>
						<label>Expiration:</label>
						<input type="number" name="expiration_month" min="01" max="12"/> / <input type="number" name="expiration_year" min="2015" max="2024"/>
					</p>
					<p>
						<label></label>
						<input type="submit" value="Pay" class="alignright"/>
					</p>
				</form>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
</body>
</html>