<img style="width:90px; height:50px;flolat:left;"src="3.png"/>
<?php
	$alert=null;
	include 'menu1.php';
	session_start();
	$a=mysqli_connect('localhost','root','','paymentgetway');
	if(isset($_POST['submit']))
	{
		$users_check=mysqli_query($a,"select * from usersignup where email='".$_POST['email']."' and password='".$_POST['password']."'");
		$users_count=mysqli_num_rows($users_check);
		if($users_count==1)
		{
			$users=mysqli_fetch_assoc(mysqli_query($a,"select * from usersignup where email='".$_POST['email']."'and password='".$_POST['password']."'"));
			$_SESSION['user_id']=$users['id'];
			header('location:addamount.php');
		}
		else
		{
			$alert='Wrong User Name or Password';
		}
	}
?>
<head>
	<link rel="stylesheet" href="../bootstrap.min.css"/>
</head>
<!--<body style="background-image:url('1.jpg'); background-size:cover; "></body>-->
<br><br><center><div class="card" style="width:35%; height:60%; background: rgba(0,0,0,0.2);">
<h1 style="font-family:Adobe Garamond Pro Bold;; color:black;">LOGIN FORM</h1>
<br><h5 style="color:red;"><?php echo $alert;?></h5>
<form action="" method="post">
<div class="form-group p-4">
	<input type="email" name="email" class="form-control"placeholder="Enter Email">
	<br><input type="password" name="password" class="form-control"placeholder="Enter Password">
	<br><input type="submit" name="submit" value="login" class="btn btn-info btn-block">
</div>
</form>
</div></center>