<img style="width:90px; height:50px;flolat:left;"src="3.png"/>
<?php
session_start();
	include 'menu.php';
	$a=mysqli_connect('localhost','root','','paymentgetway');
if(isset($_POST['send']))
{
	//mysqli_query($a,"UPDATE usersignup SET amount=amount-'".$_POST['amount']."' WHERE ID='".$_SESSION['user_id']."'");
	//mysqli_query($a,"UPDATE usersignup SET amount=amount+'".$_POST['amount']."' WHERE email='".$_POST['email']."'");
	mysqli_query($a,"UPDATE usersignup SET amount=amount-".$_POST['amount']." WHERE ID='".$_SESSION['user_id']."'");
	mysqli_query($a,"UPDATE usersignup SET amount=amount+".$_POST['amount']." WHERE email='".$_POST['email']."'");
	mysqli_query($a,"INSERT INTO transaction (`to_user`,`from_user`,`amount`,`date`) VALUES ('".$_POST['email']."','".$_SESSION['user_id']."','".$_POST['amount']."','".date("y-m-d")."')");
	header('Location: '.$_SERVER['PHP_SELF']);
	}
?>
<head>
	<link rel="stylesheet"href="../bootstrap.min.css" type="text/css">
</head>
<body style="background-image:url('.jpg'); background-size:cover;">
</body>	


<center>
<br><div class="card" style="background: rgba(0,0,0,0.2); width:50%;height:60%;">
<h1 style="color:black;font-family:Adobe Garamond Pro Bold;">SEND AMOUNT FORM</h1>
<br><br>
<form action="" method="post">
	<center>
	<div class="form-group">
	<label style="color:black;">ENTER E-MAIL:</label>
	<input class="form-control"type="email" name="email" placeholder="enter email" required>
	<br><label style="color:black;">ENTER AMOUNT:</label>
	<input class="form-control"type="number" name="amount" placeholder="enter amount" required>
	<br><input class="btn btn-primary btn-block"type="submit" name="send" value="SEND" ></center>
	</div>
	</center>
	
</form>


</center>
<table class="table">
	<tr>
		<th>Id</th>
		<th>Message</th>
		<th>on Date</th>
	</tr>
	<?php 
	    $sql=mysqli_query($a,"SELECT * FROM transaction WHERE from_user='".$_SESSION['user_id']."'");
		if(mysqli_num_rows($sql)<=0){
			echo 'No Any Trasaction Found';
		} else {
			while($rows=mysqli_fetch_assoc($sql)){
				echo '
					<tr>
					<td>'.$rows['id'].'</td>
					<td>You paid '.$rows['amount'].' to '.$rows['to_user'].'</td>
					<td>'.$rows['date'].'</td>
					</tr>
				';
			}
		}
	?>
</table>