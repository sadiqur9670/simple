<?php 
$msg = '';
$email = '';
if (isset($_POST['first_name'])) {

	$first_name = $_POST['first_name'];
	$last_name 	= $_POST['last_name'];
	$Email 		= $_POST['Email'];
	$address 	= $_POST['address'];
	$username 	= $_POST['username'];
	$password 	= md5(md5(md5(md5(md5($_POST['password'])))));
	if (empty($first_name)) {
		
		$msg = "<p class= 'error'>First Name Must Not be Empty</p>";

	}
	
	if (filter_var($Email, FILTER_VALIDATE_EMAIL) == false) {
	 	$email  = " <p class= 'error'>Email is Invalid</p>";
	}

	$msg = $msg . $email;


	if ($msg == '') {
		
		$host 	  = "localhost";
		$user 	  = "root";
		$pass 	  = "";
		$database = "usertable";

		$con = new mysqli($host,$user,$pass,$database);
		
		if ($con) {

			$slquery =  "select * from users where email='$Email'";
			$slstmt = $con->query($slquery) or die($con->error);
			if ($slstmt) {
				if ($slstmt->num_rows >0) {
					
					$msg = "<p class= 'error'>Email already exist</p>";

				}else{
					$query = "insert into users(first_name,last_name,email,address,username,password) values
					('$first_name','$last_name','$Email','$address','$username','$password')";
					$status = $con->query($query) or die($con->error);
					if ($status) {
						$msg = "<p class= 'success'>Data inserted succesfully</p>";
					}else{
						$msg = "<p class= 'error'>Data inserted failed</p>";
					}
				}
			}
			
		}else{
			$msg =  "yes connection failed";
		}

		
	}
}

?>
<!Doctype html>
<html>
<head>
	<title>Registation</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body background= "rifat.jpg">
	<section class="headder">
		<div class="head">
			<div class="logo">
				
				
			</div>
			<div class="title">
				<h3>নীলক্ষেত বই বাজার</h3>
			</div>
		</div>
	</section>
	<section class="main">
		<div class="head">
			<h2><?php echo "Registation/নিবন্ধন " ;?></h2>
			
		</div>
		<div class="mid">
			<?php 
					if(isset($_POST["first_name"])== true && empty($_POST["first_name"])== false)
					
					 
				?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

				<table>
					<tr>
						<td> First Name</td>
						<td><input type="text" name="first_name" placeholder="First Name"><br/></td>
					</tr>
						<td>Last Name</td>
						<td><input type="text" name="last_name" placeholder="Last Name"><br/></td>
					</tr>
						<td>Email</td>
						<td><input type="text" name="Email" placeholder="mail"></td>
					</tr>
						<td>address</td>
						<td><input type="text" name="address" placeholder="flat no, Builling/house, Village, Road,Polish Station,Distric"><br/></td>
					</tr>
						<td>Username</td>
						<td><input type="text" name="username" placeholder="Username"><br/></td>
					</tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Password"><br></td>
				    </tr>
					<tr>
						<td><input type="submit" name="submitbutton" value="Sign up"></td>
					</tr> 
					<br>
				</table>
				
				<div class="singup">
					<a href="index.php">or login</a>

				</div>
				
				<?php if($msg !== ''){

					echo $msg;

				} ?>
				
			

			</form>
			
			
		</div>
		<div class="footer">
			
		</div>

	</section>
</body>
</html>