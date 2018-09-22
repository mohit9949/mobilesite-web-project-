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
		$user=$_POST['username'];
		$psw=$_POST['psw'];
		$query = "INSERT INTO users(email,username,password) VALUES ('$email','$user','$psw')";
		$result = mysqli_query($con,$query);
		//$count = mysqli_num_rows($result);
		if($result)
		{
			$row=mysqli_fetch_row($result);
			$sname=$row[0];
			session_start();
			$_SESSION['SName']=$email;
			$_SESSION['Status']="Session Status: Login Success!!!";
			header("location:lab1.html");
		}
		else 
		{	
			session_start();
			if (isset($_SESSION['SName'])){
			unset($_SESSION['SName']);
		    }
		$_SESSION['Status']="Session Expired!!!";
		echo "<h2>Sign up Failed!!!</h2>";
	}
?>