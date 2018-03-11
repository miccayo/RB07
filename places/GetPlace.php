<?php

	header("Content-Type: text/plain");
	header("Cache-Control: no-cache");
	$IsRobloxPlace = isset($_GET["isRobloxPlace"]);

	$DefaultPlaceId = (!$IsRobloxPlace) ? 1 : 9301985;
	$CanUseVersion = (isset($_GET["version"]) && is_numeric($_GET["version"]));

	// Set PlaceId from input
	$PlaceId = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? $_GET["id"] : $DefaultPlaceId;
	$PlaceVersion = null;

	if (CanUseVersion) {
		$PlaceVersion = $_GET["version"];
	}

	$AssetUrl = "http://www.roblox.com/asset?id=";

	if (!$IsRobloxPlace) { $AssetUrl = "http://pork.co.nf/places/?id="; $CanUseVersion = false; }

	if ($PlaceId < 0 || $PlaceId > 10000000000) { $PlaceId = $DefaultPlaceId; }

	$FullUrl = ($PlaceVersion) ? $AssetUrl . $PlaceId . "&version=" . $PlaceVersion : $AssetUrl . $PlaceId;

?>
for i = 1, 500 do print('\n') end -- Clear the output

game:SetMessage("Loading place...")
local s, f = pcall(function()
	game:Load("<?php echo $FullUrl; ?>")
end)

if (f) then
	game:SetMessage("Failed to load place. Check output.")
	for i = 1, 500 do print('\n') end -- Clear the output

	print(string.format("Error: %s.", f))

	print("*** An error occurred while loading the place into RB07. ***")
	print("There is an issue with 2007 where some places may be too large to load. This can happen with a place like Crossroads.")
	print("Feel free to try again, but if the issue persists, there might be nothing you can do.")
else
	game:ClearMessage()
end
