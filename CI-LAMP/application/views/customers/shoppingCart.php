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

						

// 	bfirst_name
// blast_name
// baddress
// baddress2
// bcity
// bstate
// bzipcode		


// first_name
// last_name
// address
// address2
// city
// state
// zipcode			
					};
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<!-- this will become a partial -->
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
			<!-- this will be a partial -->
			<?php var_dump($this->session->userdata('items')); ?>
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
						{ ?>
							<tr>
								<td><?= $item['name']; ?></td>
								<td>$ <?= $item['price']/$item['qty']; ?></td>
								<td align="center"><?= $item['qty']; ?> <a href="/customers/update">update</a> <a href="delete/<?= $item['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
								<td>$ <?= $item['price']; ?></td>
							</tr>
						<?php $total += $item['price']; ?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
			<p class="alignright">Total: $ <?= $total ?></p>
			<div style="clear: both;"></div>
			<p class="alignright"><a href="/"><button class="shopping">Continue Shopping</button></a></p>
			<div style="clear: both;"></div>
		</div>
		<div class="customer_info">
			<div class="shipping">
				<h3>Shipping Information</h3>
				<form action="/order/create" method="post">
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
<!-- 				</form>
			</div>
			<div class="billing">
 -->				<h3>Billing Information</h3>
				<!-- <form action="/order/create" method="post"> -->
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
						<input type="text" name="expiration"/>
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