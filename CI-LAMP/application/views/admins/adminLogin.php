<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    	$(document).ready(function()
    	{

    	});
    </script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


</head>
<body>
	<h2>Admin Login Page</h2>
	<form action = "/admins/login" method = "post">
		<p>
		<input type = "text" name = "email" placeholder = "Email">
		</p>
		<p>
		<input type = "password" name = "password" placeholder = "password">
		</p>
		<p>
		<input type = "submit" value = "Login">
		</p>
	</form>
	
	<h2>Register</h2>
		<?= $this->session->flashdata('errors') ?>
	
		<form action = "/admins/register" method = "post">
		<p>
			<input type = "text" name="email" placeholder = "Email">
		</p>
		<p>
			<input type = "password" name="password" placeholder = "Password">
		</p>
		<p>
			<input type = "password" name="conf_password" placeholder = "Confirm Password">
		</p>
		<input type = "submit" value = "Register">

	</form>
</body>
</html>