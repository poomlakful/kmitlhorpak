<?php
	$cn = mysqli_connect("localhost","root","");
	$result = mysqli_select_db($cn,"horpak_db");
	if(!$result)
		echo "fail to connect db";
?>