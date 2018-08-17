<?php 

	// BD
	include '../conn.php';

	// paramtros get
	$id = $_GET['pedido_id'];

	$updated = "UPDATE user_pack set estado=2 WHERE id=$id";
	mysqli_query($conn,$updated);
	$conn->close();
	echo 'ok';
	

?>