<?php 
session_start();
include '../includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
	<link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="login">
			<form method="post" action="login.php">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="pwd" placeholder="Password" required="">
				<button type="submit" name="login">Login</button>
			</form>
		</div>
	</div>
</body>
</html>  
<?php if(isset($_POST['login'])){
				$email=$_POST['email'];
				$pwd=$_POST['pwd'];
				$select_user_query="SELECT * FROM users WHERE user_email='$email'";
				$select_user_result=mysqli_query($connection,$select_user_query);
				while($row=mysqli_fetch_assoc($select_user_result)){
					$db_username=$row['user_name'];
					$db_email=$row['user_email'];
					$db_password=$row['password'];
					$db_userrole=$row['user_role'];
					$db_user_image=$row['user_image'];
				}
				if($email !== $db_email || $pwd !== $db_password){
					echo "Password is wrong";
				}else if($email==$db_email && $pwd==$db_password){
					$_SESSION['user_name']=$db_username;
					$_SESSION['role']=$db_userrole;
					$_SESSION['user_email']=$db_email;
					$_SESSION['image']=$db_user_image;
					if($_SESSION['role'] !=='admin'){
						header('location:../'); 
					}else{
					  header('location:index.php');
					}
				}
			}
			
			?>
