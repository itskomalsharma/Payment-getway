<img style="width:90px; height:50px;flolat:left;"src="3.png"/>
<?php
$alert=null;
include 'menu2.php';
$a=mysqli_connect('localhost','root','','paymentgetway');
if(isset($_POST['submit']))
{
	$b=mysqli_query($a,"insert into usersignup(`name`,`email`,`amount`,`password`) values('".$_POST['name']."','".$_POST['email']."','".$_POST['amount']."','".$_POST['password']."')");
	
	if($b)
	{
		$alert='Inserted';
		header('Location: '.$_SERVER['PHP_SELF']);
	}
	else
	{
		$alert='Not Inserted';
	}
}

?>
<head>
	<link rel="stylesheet"href="../bootstrap.min.css" type="text/css">
</head>
<!--<body style="background-image:url('1.jpg'); background-size:cover;">
</body>	-->

<center>
<br>
<div class="card" style="width:90%; height:70%; background: rgba(0,0,0,0.2);">
<h1 style="color:black;font-family:Adobe Garamond Pro Bold;">USER SIGNUP FORM</h1>
<h5 style="color:red;"><?php echo $alert;?></h5>
<br><form action="" method="post">
	<center>
	<div class="form-group">
	<div class="row">
		<div class="col-3" style="color:black;">Name</div>
		<div class="col-9"><input class="form-control"type="text" name="name" placeholder="enter name" required></div>
	</div>
	<br><div class="row">
		<div class="col-3" style="color:black;">E-mail</div>
		<div class="col-9"><input class="form-control"type="email" name="email" placeholder="enter e-mail" required></div>
	</div>
	<br><div class="row">
		<div class="col-3" style="color:black;">Amount</div>
		<div class="col-9"><input class="form-control"type="number" name="amount" placeholder="enter amount" required></div>
	</div>
	<br><div class="row">
		<div class="col-3" style="color:black;">Password</div>
		<div class="col-9"><input class="form-control"type="password" name="password" placeholder="enter password" required></div>
	</div>
	<br><center><input style="width:50%;"class="btn btn-primary "type="submit" name="submit" value="Signup"></center>
	</div>
	</center>
	
</form>
</div>
</center>



