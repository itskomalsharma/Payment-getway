<?php
session_start();
	include 'menu.php';
	$a=mysqli_connect('localhost','root','','paymentgetway');
	$users=mysqli_fetch_assoc(mysqli_query($a,"SELECT * FROM usersignup WHERE id=".$_SESSION['user_id'].""));
?>
<table class="table">
	<tr>
		<th>Id</th>
		<th>Message</th>
		<th>on Date</th>
	</tr>
	<?php 
	    $sql=mysqli_query($a,"SELECT * FROM transaction WHERE to_user='".$users['email']."'");
		if(mysqli_num_rows($sql)<=0){
			echo 'No Any Trasaction Found';
		} else {
			while($rows=mysqli_fetch_assoc($sql)){
				$user_a=mysqli_fetch_assoc(mysqli_query($a,"SELECT * FROM usersignup WHERE id=".$rows['from_user'].""));
				echo '
				<tr>
					<td>'.$rows['id'].'</td>
					<td>You received '.$rows['amount'].' from '.$user_a['name'].'</td>
					<td>'.$rows['date'].'</td>
				</tr>';
			}
		}
	?>
</table>