<!DOCTYPE html>
<html>

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

	</head>

	<body class="bg-grey-lighter relative w-100 text-grey-darkest p-6">

		<div class="container mx-auto flex w-100">

			<div class="mx-auto max-w-sm flex justify-center items-center text-center">

				<div class="bg-white p-6 rounded border border-grey-dark">

					<!-- logo -->
					<img src="http://pork.co.nf/RB07.png" class="rounded-t-lg">
					<img src="http://pork.co.nf/thumbs/Friends.png" style="width:225px; height:auto;" class="p-4">

					<h2 class="pb-4">RB<small>07</small></h2>

					<b class="text-sm pb-6">I cannot stress this enough: the 2007 build of Roblox contains <i><u>major</u></i> security flaws. Be aware.</b>

					<p class="text-sm pt-4">I am by no means responsible for any potential damage caused.</p>
					<p class="text-sm">Thank you for using RB07.</p>

					<br />

					<hr class="border border-grey-light" />

					<p class="text-sm p-4">
						Check out the server on <a class="text-blue" href="https://discord.gg/tcarKt6">Discord</a>
					</p>

					<hr class="border border-grey-light" />

					<p class="text-base pb-2 pt-4">
						Join a Game
					</p>

					<form method="GET" action="/js.php" autocomplete="off" class="pt-3">
						<input type="text" class="rounded border border-grey-dark padded-w" placeholder="Server IP" name="ServerIP">
						<br /><br />
						<input type="text" class="rounded border border-grey-dark padded-w" placeholder="Username" name="Username">
						<br /><br />
						<input type="hidden" name="l" />
						<input type="submit" class="rounded p-2 border border-grey-dark" value="Join Game">
					</form>

					<hr class="border border-grey-light" />

					<p class="text-base p-4">
						Host a Game
					</p>
					<p class="text-xs p-1">You seemingly can't choose a port to host on in 2007, so it's <b>53640</b>.</p>
					<p class="text-xs p-1"><i>Please</i> read the top of the script, or you might not know how to use it.</p>
					<p class="text-xs p-1 pb-4"><code>RB07Server.exe -no3d</code> will also help out with lag.</p>

					<form method="GET" action="/host.php" autocomplete="off">
						<input type="submit" class="rounded p-2 border border-grey-dark" value="Get Hosting Script">
					</form>

					<hr class="border border-grey-light" />

					<p class="text-base p-4 pb-2">Releases</p>

					<p class="text-xs p-1 pb-4">(Hosted on https://quinl.github.io/)</p>

					<table class="w-full text-center table-collapse border border-grey-dark rounded">
					    <thead>
					        <tr>
					            <th class="text-sm font-semibold text-grey-darkest p-2 bg-grey-lighter">Version</th>
					            <th class="text-sm font-semibold text-grey-darkest p-2 bg-grey-lighter">Download</th>
					        </tr>
					    </thead>
					    <tbody class="align-baseline">
					    	<tr>
					        	<td class="p-2 border-t border-grey-light text-xs whitespace-no-wrap">1.2.4 (latest)</td>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-pre"><a href="https://quinl.github.io/rb07-releases/1.2.4_final.zip" class="text-blue">Click Here</a></td>
					        </tr>
					    	<tr>
					        	<td class="p-2 border-t border-grey-light text-xs whitespace-no-wrap">1.2.1</td>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-pre"><a href="https://quinl.github.io/rb07-releases/1.2.1_final.zip" class="text-blue">Click Here</a></td>
					        </tr>
					    	<tr>
					        	<td class="p-2 border-t border-grey-light text-xs whitespace-no-wrap">1.1</td>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-pre"><a href="https://quinl.github.io/rb07-releases/1.1_final.zip" class="text-blue">Click Here</a></td>
					        </tr>
					    	<tr>
					        	<td class="p-2 border-t border-grey-light text-xs whitespace-no-wrap">1.0.1</td>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-pre"><a href="https://quinl.github.io/rb07-releases/1.0.1_final.zip" class="text-blue">Click Here</a></td>
					        </tr>
					        <tr>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-no-wrap">1.0.0 (initial release)</td>
					            <td class="p-2 border-t border-grey-light text-xs whitespace-pre"><a href="https://quinl.github.io/rb07-releases/1.0.0_final.zip" class="text-blue">Click Here</a></td>
					        </tr>
					    </tbody>
					</table>

					<br />

					<b class="text-xs pt-2">As of 1.1, RB07 can break your Finobe install because of how unstable 2007 is.</b>
					<b class="text-xs pt-2">YMMV.</b>

					<p class="text-xs pt-2">Please be sure to open the README.txt file and follow the instructions.</small>
				</div>
			</div>
		</div>

	</body>

</html>
