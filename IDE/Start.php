<?php

	$ContentLength = $_SERVER['HTTP_CONTENT_LENGTH'];

	if ($ContentLength > 0) { // 2007-specific check I believe
		header("Location: http://pork.co.nf");
	}

?>

<!DOCTYPE html>

	<head>
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=8" />

		<title>RB07 - Studio Home</title>

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

			// Webapp
			var app;
			try {
				app = window.external.GetApp();
			} catch (e) {
				window.location = "http://pork.co.nf/";
			}

			if (!window.external.IsRobloxIDE) {
				window.location = "/";
			}

			function startPlace(id, isRobloxPlace, version) {
				var url = "";
				isRobloxPlace = isRobloxPlace || false;
				url += "http://pork.co.nf/places/GetPlace.aspx?id=" + id;
				if (isRobloxPlace) { url += "&isRobloxPlace"; }
				if (version) { url += "&version=" + version; }
				// document.write(url);
				var game = app.CreateGame(2);
				game.ExecUrlScript(url);
			}

		</script>
	</head>

	<body class="bg-grey-lighter relative w-100 text-grey-darkest p-6">
		
		<div class="container mx-auto flex w-100">

			<div class="mx-auto max-w-sm flex justify-center items-center text-center" style="transform:translateY(-50%);">

				<center>

					<img src="http://pork.co.nf/RB07.png" />

					<h4 style="padding: 25px;">Starter Places</h4>

					<div style="padding: 10px; display: table-cell;">
						<img src="http://pork.co.nf/thumbs/places/Baseplate.png" alt="Baseplate Thumbnail" style="height: auto; width: 150px; padding: 10px;" />
						<br />
						<small>Baseplate</small>
						<br />
						<small>
							<a href="#" onclick="startPlace(1, false)">Start Place</a>
						</small>
					</div>

					<div style="padding: 10px; display: table-cell;">
						<img src="http://pork.co.nf/thumbs/places/ChaosCanyon.png" alt="Chaos Canyon Thumbnail" style="height: auto; width: 150px; padding: 10px;" />
						<br />
						<small>Chaos Canyon</small>
						<br />
						<small>
							<a href="#" onclick="startPlace(14403, true, 1)">Start Place</a>
						</small>
					</div>

				</center>

			</div>

		</div>

	</body>

</html>