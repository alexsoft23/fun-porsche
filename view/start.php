<div class="container text-center">
<p> </p>
<?php require_once ('./control/img.php'); ?>
<?php
		$fields = [];
		$fields['published'] = true;
		$news = News::find($fields);
		foreach ($news as $item) {
			echo("<div id='news' class='container'>");
			echo("<h2>" . $item['title'] . "</h2>");
			echo($item['text']);
			echo("</div>");
			echo("<br><div id='metadata' class='text-center'>");
			echo("Додано " . $item['date'] . " автором " . "<a href='#'>" . $item['name'] . "</a></center>");
			echo("</div>");
		}
?>
<img src="<?= $dir."/".$files[rand(0,$count_files)] ?>" class="img-thumbnail" alt="PORSCHE" width="800" height="600">
<p> </p>
</div>
