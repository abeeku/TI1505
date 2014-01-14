<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- CSE 190 M Homework 4 (NerdLuv) -->
	<head>
		<title>NerdLuv</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/nerdluv.css" type="text/css" rel="stylesheet" />
		<link href="nerdluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerarea">
			<img src="http://www.st.ewi.tudelft.nl/~hidders/wdbt/pract/wk3-3/nerdluv.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<?php
		$singles = file("singles.txt");
		$post = $_REQUEST;
		$post['seeking'] = ($post['seekingm'] == 'on' ? 'M' : '') . ($post['seekingf'] == 'on' ? 'F' : '');
		foreach ($singles as $singleimp) {
			$single = explode(',', $singleimp);
			if (similar_text($post['seeking'], $single[1]) && similar_text($post['gender'], $single[5])) {
				$rating = 0;
				if ($post['minage'] <= $single[2] && $single[2] <= $post['maxage'])
					$rating++;
				if ($post['favos'] == $single[4])
					$rating += 2;
				$rating += similar_text(strtoupper($post['ptype']), $single[3]);
				?>
				<div class="match">
					<img src="images/default-user.jpg" alt="image" />
					<p><?= $single[0] ?></p>
					<ul>
						<li><strong>gender:</strong><?= $single[1] ?></li>
						<li><strong>age:</strong><?= $single[2] ?></li>
						<li><strong>type:</strong><?= $single[3] ?></li>
						<li><strong>OS:</strong><?= $single[4] ?></li>
						<li><strong>rating:</strong><?= $rating ?></li>
					</ul>
				</div>
				<?php
					// $single[5] == seeking genders
					// $single[6] == min age
					// $single[7] == max age
			}
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
