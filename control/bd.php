<?php
	$link = new mysqli("localhost", "root", "", "porshe");
	if ($link->connect_errno) {
			echo "Database error <br>";
			echo "Connect failed: <br>".$link->connect_error;
			$correct = false;
			
			exit();
		}
