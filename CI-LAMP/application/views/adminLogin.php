<html>
<head>
	<title>Admin Login Page</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    	$(document).ready(function()
    	{

    	});
    </script>


	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
	<h2>Admin Login Page</h2>
	<form action = "/admin/login" method = "post">
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