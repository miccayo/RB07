<?php

	header("Cache-Control: no-cache");

	$DefaultPlaceId = 1;
	$PorkPlaces = array(
		1 => "Baseplate.rbxl"
	);

	$PlaceId = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? $_GET["id"] : $DefaultPlaceId;
	$PlaceId = (PlaceId > 0) ? $PlaceId = $PlaceId : $DefaultPlaceId;
	$PlaceId = (PlaceId < 100) ? $PlaceId = $PlaceId : $DefaultPlaceId;

	header("Location: http://pork.co.nf/places/" . $PorkPlaces[$PlaceId]);

?>
