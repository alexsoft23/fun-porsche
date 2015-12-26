<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Fun-Porsche</title>
    <link href="./style/style.css" rel="stylesheet">
	<link href="./style/bootstrap.css" rel="stylesheet">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script type='text/javascript' src='js/gen_validatorv31.js'></script>

</head>
<body bgproperties = "fixed">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php?action=index">Fun-Porsche</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="./index.php?action=index">Головна</a></li>
		<li><a href="./index.php?action=add_news">Додати новину</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="./index.php?action=gallery">Галерея<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./index.php?action=photo">Фото</a></li>
            <li><a href="./index.php?action=movie">Відео</a></li>
          </ul>
        </li>
        <li><a href="./index.php?action=about_us">Про нас</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="./index.php?action=setting"><span class="glyphicon glyphicon-wrench"></span> Налаштування</a></li>
        <li><a href="./index.php?action=user"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['name'];?></a></li>
        <li><a href="./index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Вихід</a></li>
      </ul>
    </div>
  </div>
</nav>
