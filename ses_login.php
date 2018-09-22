<?php
	$con = mysqli_connect("localhost:8889","root","root");
	
		if(!$con)
		{
			echo "not connected";
		}
	
		if(!mysqli_select_db($con,'user'))
		{
			echo "data base not connected";
		}
		$email=$_POST['email'];
		$psw=$_POST['psw'];
		$query = "SELECT * FROM users WHERE username='$email' and password='$psw'";
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
			$row=mysqli_fetch_row($result);
			$sname=$row[0];
			session_start();
			$_SESSION['SName']=$email;
			$cookie_name = "user";
			$cookie_value = $email;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			$_SESSION['Status']="Session Status: Login Success!!!";
			header("location:check.php");
		}
		else 
		{	
			session_start();
			if (isset($_SESSION['SName'])){
			unset($_SESSION['SName']);
		    }
		$_SESSION['Status']="Session Expired!!!";
		echo "<h2>Login Failed!!!</h2>";
	}
?>