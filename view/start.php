<div class="container">
<p> </p>
<?php require_once ('./control/img.php'); ?>
<?php

		if (!isset($_GET['page']))
			$_GET['page'] = 1;
		if (!isset($_POST['count_page']))
			$_POST['count_page'] = 5;
			
		$count = $_POST['count_page'];// кількість записів на сторінку
		$page = $_GET["page"];//номер сторінки
		$shift = $count * ($page - 1);
		
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
		
		echo("<div id='news' class='container text-left col-sm-10'>");
		$count_p = News::countOfPublished() / $count ;
		if($count_p > (int)$count_p)
			$count_p = (int)$count_p + 1;
		else
			$count_p = (int)$count_p;
		echo "<ul class='pagination'>";
		for($i=1; $i<=$count_p; $i++)
			echo "<li><a href=\"index.php?action=index&page=$i\">$i</a></li>";
		echo "</ul>";
		echo("</div>");
?>
	<div class="col-sm-2 slideanim text-right">
		<form action="index.php?action=index" method="POST">
			<div class="form-group text-right col-sm-8">
				<select class="form-control" id="count_page" name="count_page" data-toggle="tooltip">
					<option>5</option>
					<option>10</option>
					<option>20</option>
					<option>40</option>
					<option>60</option>
					<option>100</option>
				</select>
			</div>
			<div class="form-group text-right col-sm-4">
				<input class="btn btn-default" type="submit" value="Змінити"/>
			</div>
		</form>
	</div>
</div>
<div class="container text-center">
<img src="<?= $dir."/".$files[rand(0,$count_files)] ?>" class="img-thumbnail" alt="PORSCHE" width="800" height="600">
<p> </p>
</div>
