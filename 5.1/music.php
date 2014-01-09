<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-1/viewer.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		
		
		<div id="listarea">
			<ul id="musiclist">
				<?php
				chdir("songs");
				if (!isset($_REQUEST["playlist"])) {
					$songs = glob("*.mp3");
					$playlists = glob("*.txt");
				} else {
					$songs = file($_REQUEST["playlist"]);
				}

				if (isset($_REQUEST["shuffle"])) {
					shuffle($songs);
				}

				if (isset($songs)) {
					foreach ($songs as $filename) {
						$filename = trim($filename);
						$bytes = filesize($filename);
						if ($bytes >= 1048576) {
							$bytes = number_format($bytes / 1048576, 2) . ' MB';
						} elseif ($bytes >= 1024) {
							$bytes = number_format($bytes / 1024, 2) . ' KB';
						} else {
							$bytes = number_format($bytes) . ' B';
						}
						?>
						<li class="mp3item">
							<a href="<?=$filename?>"><?=basename($filename)?></a> (<?=$bytes?>)
						</li>
						<?php
					}
				}
				if (isset($playlists)) {
					foreach ($playlists as $filename) {
					?>
						<li class="playlistitem">
							<a href="?playlist=<?=$filename?>"><?=basename($filename)?></a>
						</li>
					<?php
					}
				}
				?>
			</ul>
		</div>
	</body>
</html>
