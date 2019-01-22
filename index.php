<!Doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body background= "rifat.jpg">
	<section class="headder">
		<div class="head">
			<div class="logo">
				
			</div>
			<div class="title">
				<h3>নীলক্ষেত বই বাজার </h3>
			</div>
		</div>
	</section>
	<section class="main">
		<div class="head">
			<h2><?php echo "Login" ;?></h2>
			
		</div>
		<div class="mid">
			<form method="post" action="<?phop echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" placeholder="Username"><br/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Password"><br></td>
					</tr>
				</table>
				
				
				
				
				<input type="button" name="botton" value="Login">
				<br><br>
				<div class="singup">
					<a href="registation.php">or Registation</a>

				</div>

			</form>
			
		</div>
		<div class="footer">
			
		</div>

	</section>
</body>
</html>