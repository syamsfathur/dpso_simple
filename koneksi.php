<?php
	// global $koneksi;
	$koneksi = mysqli_connect("localhost","root","","ga-pso");

	if (mysqli_connect_errno()){
		die('Connect Error: ' .mysqli_connect_errno());
	}else{
	}

?>