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

		<form action="results.php" method="post">
			<fieldset>
				<legend>New User Signup:</legend>
				<span class="column">Name:</span>		<input type="text" name="name" /><br/>
				<span class="column">Gender:</span>		<input type="radio" name="gender" value="M">Male</input>
										<input type="radio" name="gender" value="F">Female</input><br/>
				<span class="column">Age:</span>		<input type="text" name="age" /><br/>
				<span class="column">Personality type:</span>	<input type="text" name="ptype" /><br/>
				<span class="column">Favorite OS:</span>	<select name="favos">
											<option value="windows">Windows</option>
											<option value="macosx">Mac OS X</option>
											<option value="linux">Linux</option>
											<option value="other">other</option>
										</select><br/>
				<span class="column">Seeking:</span>		<input type="checkbox" name="seekingm">Male</input>
										<input type="checkbox" name="seekingf">Female</input><br/>
				<span class="column">Between ages:</span>	<input type="text" size="5" name="minage" />and<input type="text" size="5" name="maxage" /><br/>
				<input type="submit" value="Sign Up" />
			</fieldset>
		</form>

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
