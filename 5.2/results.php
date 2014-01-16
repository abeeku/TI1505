<?php
include 'common.php';

printheader();

$post = $_REQUEST;
$post['seeking'] = (isset($post['seekingm']) ? 'M' : '') . (isset($post['seekingf']) ? 'F' : '');

$singles = file("singles.txt");
foreach ($singles as $single) {
	$single = explode(',', $single);
	if ($single[0] == $post['name']) {
		$user = array(	"name" =>	$single[0],
				"gender" =>	$single[1],
				"age" =>	$single[2],
				"ptype" =>	$single[3],
				"favos" =>	$single[4],
				"seeking" =>	$single[5],
				"minage" =>	$single[6],
				"maxage" =>	$single[7]);
	}
}

if (!isset($user)) {
	$user = array(	"name" =>	$post['name'],
			"gender" =>	$post['gender'],
			"age" =>	$post['age'],
			"ptype" =>	$post['ptype'],
			"favos" =>	$post['favos'],
			"seeking" =>	$post['seeking'],
			"minage" =>	$post['minage'],
			"maxage" =>	$post['maxage']);
	$data = implode(',', $user);
	file_put_contents("singles.txt", $data . "\n", FILE_APPEND);
}

?>
<h1>Matches for <?= $user['name'] ?></h1>
<?php

foreach ($singles as $singleimp) {
	$single = explode(',', $singleimp);
	if (similar_text($user['seeking'], $single[1]) && similar_text($user['gender'], $single[5])) {
		$rating = 0;
		if ($user['minage'] <= $single[2] && $single[2] <= $user['maxage'])
			$rating++;
		if ($user['favos'] == $single[4])
			$rating += 2;
		$rating += similar_text(strtoupper($user['ptype']), $single[3]);

		if ($rating >= 3) {

			$file = "images/" . strtolower(str_replace(' ', '_', $single[0]) . ".jpg");
			if (!file_exists($file))
				$file = "images/default-user.jpg";
			?>
			<div class="match">
				<p><?= $single[0] ?>
					<img src="<?= $file ?>" alt="image" />
					<ul>
						<li><strong>gender:</strong><?= $single[1] ?></li>
						<li><strong>age:</strong><?= $single[2] ?></li>
						<li><strong>type:</strong><?= $single[3] ?></li>
						<li><strong>OS:</strong><?= $single[4] ?></li>
						<li><strong>rating:</strong><?= $rating ?></li>
					</ul>
				</p>
			</div>
			<?php
				// $single[5] == seeking genders
				// $single[6] == min age
				// $single[7] == max age
		}
	}
}

printfooter();
?>

