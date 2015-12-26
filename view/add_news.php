<div class="container text-center">
<p> </p>
<?php require_once ('./control/img.php'); ?>
<img src="<?= $dir."/".$files[rand(0,$count_files)] ?>" class="img-thumbnail" alt="PORSCHE" width="400" height="300">
<p> </p>
</div>

<div id="news" class="container-fluid bg-grey text-center">
	<h2>Форма додавання новини</h2>
		<div class="row text-center" >
			<div class="col-sm-2 text-left">
				<p>Тут ви можете додати свою новину. Новина буде додана після перевірки адміністратором.</p>
			</div>
			<form action="index.php?action=news_add" method="POST">
				<div class="col-sm-6 slideanim text-right">
					<div class="row">
						<div class="col-sm-12 form-group">
							<input class="form-control" id="name" placeholder="Тема новини" type="text" rows="2" name = "news_title">
						</div>
					</div>
					<textarea class="form-control" id="comments" placeholder="Введіть вашу новину" rows="5" name = "news_text"></textarea><br>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button class="btn btn-default pull-right" type="submit">Надіслати</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>