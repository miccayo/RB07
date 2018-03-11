<?php
	$ContentLength = $_SERVER['HTTP_CONTENT_LENGTH'];

	if ($ContentLength > 0) { // 2007-specific check I believe
		header("Location: http://pork.co.nf");
	}
?>

<!DOCTYPE html>

	<head>
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">


		<title>RB07</title>

		<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Fira+Sans');

			body {
				font-family: 'Fira Sans', sans-serif;
			}

			.padded-w {
				padding: 3px;
			}
		</style>

		<script>
			try {
				window.external.ExecScript("return true");
			} catch (e) {
				window.location = "http://pork.co.nf";
			}
		</script>
	</head>

	<body class="bg-grey-lighter relative w-100 text-grey-darkest p-6" style="width:100%;">
		
		<div class="container mx-auto flex w-100">

			<div class="mx-auto max-w-sm flex justify-center items-center text-center" style="transform:translateY(-50%);">

				<center>

					<img src="http://pork.co.nf/RB07.png" />

					<script>
						function insertRobloxAsset(assetId) {
							window.external.Insert("http://www.roblox.com/asset?id=" + assetId);
						}

						// https://www.roblox.com/sets/get-roblox-sets
						// https://www.roblox.com/sets/sethandler.ashx?rqtype=getsetitems&startRowIndex=0&maximumRows=25&setid=464140
					</script>

					<h4 style="padding:25px;">Again, I can't do a lot here due to IE limitations.</h4>
					<h5>Yes, toolbox is coming. No ETA.</h5>

					<?php echo $UserAgent; ?>

					<button onclick="createItem(864)">Insert Item</button>

				</center>

			</div>

		</div>

	</body>

</html>