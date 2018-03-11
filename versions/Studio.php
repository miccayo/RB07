<?php

	// Also an incomplete feature that would include version hashing (not very important)

	header("Content-Type: application/json");

	$Versions = json_encode(
		array(
			"1.2.1" => "dbb80833ce8a894b7563669aee254e9adbcb56b60560e49a084ac640c34c4d2c"
		)
	);

	echo $Versions;

?>
