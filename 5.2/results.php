<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- CSE 190 M Homework 4 (NerdLuv) -->
	<head>
		<title>NerdLuv</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/nerdluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerarea">
			<img src="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/nerdluv.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<?php
		$singles = file("singles.txt");
		foreach ($singles as $single) {
			print_r($single . "<br>");
		}
		?>

		<div>
			<p>
				Results and page (C) Copyright 2010 NerdLuv Inc.
			</p>
			
			<ul>
				<li>
					<a href="index.php">
						<img src="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/back.gif" alt="icon" />
						Back to front page
					</a>
				</li>
			</ul>
		</div>

		<div id="w3c">
			<a href="https://webster.cs.washington.edu/validate.php">
				<img src="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/w3c-xhtml.png" alt="Valid XHTML 1.1" />
			</a>
			<a href="https://webster.cs.washington.edu/validate-css.php">
				<img src="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>