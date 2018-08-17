<?php 
	
	// iniciamos session	
	$doc_ = $_SESSION['doc'];

	if ($doc_ == null || $doc_ == '') {
		header("Location: /index.php");
	}


?>