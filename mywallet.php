<?php
	include'menu.php';
	session_start();
	$a=mysqli_connect('localhost','root','','paymentgetway');
	$b=mysqli_query($a,"select * from usersignup WHERE ID='".$_SESSION['user_id']."'");
	$c=mysqli_fetch_assoc($b);
?>
<h2><?php echo $c['name'];?></h2>
<h1> Rs.=<?php echo $c['amount'];?></h1>