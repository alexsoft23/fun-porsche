<div class="container">
<p> </p>
<?php require_once ('./control/img.php'); ?>
<?php
		$fields = [];
		$fields['published'] = true;
		$news = News::find($fields);
		foreach ($news as $item) {
			echo("<div id='news' class='container text-center'>");
			echo("<h2>" . $item['title'] . "</h2></div><div text-left'>");
			echo($item['text']);
			echo("</div>");
			echo("<br><div id='metadata' class='text-center'>");
			echo("<div class='col-sm-6 text-left'>Додано " . $item['date'] . " </div><div class='col-sm-6 text-right'>автором " . "<a href='#'>" . $item['name'] . "</a></div>");
			echo("</div>");
		}
?>
</div>
<div class="container text-center">
<img src="<?= $dir."/".$files[rand(0,$count_files)] ?>" class="img-thumbnail" alt="PORSCHE" width="800" height="600">
<p> </p>
</div>
