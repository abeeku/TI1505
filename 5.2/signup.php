<?php
include 'common.php';

printheader();
?>
<form action="results.php" method="get">
	<fieldset>
		<legend>New User Signup:</legend>
		<strong>Name:</strong>			<input type="text" name="name" size="16" /><br/>
		<strong>Gender:</strong>		<input type="radio" name="gender" value="M" />Male
							<input type="radio" name="gender" value="F" />Female<br/>
		<strong>Age:</strong>			<input type="text" name="age" size="5" maxlength="2" /><br/>
		<strong>Personality type:</strong>	<input type="text" name="ptype" size="5" maxlength="4" />
							(<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)<br/>
		<strong>Favorite OS:</strong>		<select name="favos">
								<option value="Windows">Windows</option>
								<option value="Mac OS X">Mac OS X</option>
								<option value="Linux">Linux</option>
								<option value="Other">other</option>
							</select><br/>
		<strong>Seeking:</strong>		<input type="checkbox" name="seekingm" />Male
							<input type="checkbox" name="seekingf" />Female<br/>
		<strong>Between ages:</strong>		<input type="text" name="minage" size="5" maxlength="2" />and
							<input type="text" name="maxage" size="5" maxlength="2" /><br/>
		<input type="submit" value="Sign Up" />
	</fieldset>
</form>
<?php

printfooter();
?>
