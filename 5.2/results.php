<?php
include 'common.php';

printheader();

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

