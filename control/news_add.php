<?php
		echo ("<div id='news_add' class='container-fluid bg-grey text-center'>");
		if (isset($_POST['news_title']) && isset($_POST['news_text'])) {
			$error = "";
			$flag = true;
			if (trim($_POST['news_title']) == ""){
				$error = $error . "Заголовок новини не може бути порожнім" . "<br>";
				$flag = false;
			}
			if (trim($_POST['news_text']) == ""){
				$error = $error . "Текст новини не може бути порожнім" . "<br>";
				$flag = false;
			}
			if (!$flag) {
				echo "<div class='panel panel-danger col-sm-10 col-sm-offset-1'>
					<div class='panel-heading'><strong>Увага!</strong> Поверніться та заповніть необхідні поля.</div><div class='panel-body'>" . $error . "</div></div>";
			}
			
			else {
				$record = [];
				$record['title'] = $_POST['news_title'];
				$record['text'] = $_POST['news_text'];
				$record['author_id'] = $_SESSION['id'];
				//$record['date'] = date("");
				$record['published'] = false;
				News::create($record);
				echo("<div class='alert alert-success col-sm-10 col-sm-offset-1'><strong>Успіх!</strong> Новина була успішно додана. Очікуйте перевірки модератором.</div>");
			}
	
		}
		else {
			header("Location: ./index.php?action=add_news");
		}
		echo ("</div>");