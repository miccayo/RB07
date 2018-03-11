<!DOCTYPE html>

	<head>

		<script>
			function insertContentById(id) {
				try {
					// version=1 to hopefully get the earliest version of said model
					// window.external.Insert("http://www.roblox.com/asset?id=" + id + "&version=1");
					window.external.Insert("http://www.roblox.com/asset?id=" + id);
				} catch (e) {
					alert("An error occurred while trying to fetch the asset.");
				}
			}
			// function insertContentURL(e){try{window.external.Insert("http://www.nobelium.xyz/Asset/?id=" + e)}catch(x){alert("An error occurred:" + "http://nobelium.xyz/Asset/?id=" + e)}}
		</script>

	</head>

	<body>

		<a onclick="insertContentById(864)">insert red figure</a>

	</body>

</html>
