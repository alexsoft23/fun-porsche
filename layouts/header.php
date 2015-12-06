<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Fun-Porsche</title>
    <link href="./style/style.css" rel="stylesheet">
	<link href="./style/bootstrap.css" rel="stylesheet">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</head>
<body bgproperties = "fixed">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php?action=index">Fun-Porsche</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="./index.php?action=index">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="./index.php?action=gallery">Gallery<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./index.php?action=photo">Photo</a></li>
            <li><a href="./index.php?action=movie">Movie</a></li>
          </ul>
        </li>
        <li><a href="./index.php?action=about">About us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>