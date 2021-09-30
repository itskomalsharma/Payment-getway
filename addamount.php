<img style="width:90px; height:50px;flolat:left;"src="3.png"/>
<?php
session_start();
	include 'menu.php';
	$a=mysqli_connect('localhost','root','','paymentgetway');
if(isset($_POST['add']))
{
	mysqli_query($a,"UPDATE usersignup SET amount=amount+".$_POST['amount']." WHERE id='".$_SESSION['user_id']."'");
}
?>
<head>
	<link rel="stylesheet"href="../bootstrap.min.css" type="text/css">
</head>
<!--<body style="background-image:url('1.jpg'); background-size:cover;">
</body>	-->


<center>
<br><br><br><div class="card" style="background: rgba(0,0,0,0.2); width:50%;height:50%;">
<h1 style="color:black;font-family:Adobe Garamond Pro Bold;">ADD AMOUNT FROM</h1>
<br><br>
<form action="" method="post">
	<center>
	<div class="form-group">
	<br><label style="color:black;">ENTER AMOUNT:</label>
	<input class="form-control"type="number" name="amount" placeholder="enter amount" required>
	<br><input class="btn btn-primary btn-block"type="submit" name="add" value="ADD"></center>
	</div>
	</center>
	
</form>

</center>


