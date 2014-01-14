<?php
include 'common.php';

printheader();
?>
<form action="results.php" method="request">
	<fieldset>
		<legend>New User Signup:</legend>
		<strong>Name:</strong>			<input type="text" name="name" /><br/>
		<strong>Gender:</strong>		<input type="radio" name="gender" value="M">Male</input>
							<input type="radio" name="gender" value="F">Female</input><br/>
		<strong>Age:</strong>			<input type="text" name="age" /><br/>
		<strong>Personality type:</strong>	<input type="text" name="ptype" /><br/>
		<strong>Favorite OS:</strong>		<select name="favos">
								<option value="Windows">Windows</option>
								<option value="Mac OS X">Mac OS X</option>
								<option value="Linux">Linux</option>
								<option value="Other">other</option>
							</select><br/>
		<strong>Seeking:</strong>		<input type="checkbox" name="seekingm">Male</input>
							<input type="checkbox" name="seekingf">Female</input><br/>
		<strong>Between ages:</strong>		<input type="text" size="5" name="minage" />and<input type="text" size="5" name="maxage" /><br/>
		<input type="submit" value="Sign Up" />
	</fieldset>
</form>
<?php

printfooter();
?>
