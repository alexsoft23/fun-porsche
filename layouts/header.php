<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?><!DOCTYPE html>
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
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="./index.php?action=gallery">Галерея<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./index.php?action=photo">Фото</a></li>
            <li><a href="./index.php?action=movie">Відео</a></li>
          </ul>
        </li>
        <li><a href="./index.php?action=about_us">Про нас</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#mySignUp" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Зареєструватися</a></li>
        <li><a href="#myLogin" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Вхід</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade text-left" id="myLogin" role="dialog">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Вхід на сайт</h4>
			</div>
			<div class="modal-body">
				<form id='login' action = 'index.php?action=login' method = "POST" role="form">
					<div class="form-group">
						<label for="login">Логін:</label>
						<input type='text' placeholder = "Login" name='login' id='username'  maxlength="50" class="form-control">
						<span id='login_username_errorloc' class='error'></span>
					</div>
					<div class="form-group">
						<label for="pwd">Пароль:</label>
						<input type='password'  placeholder = "Password" name='password' id='password' maxlength="50" class="form-control">
						<span id='login_password_errorloc' class='error'></span>
					</div>
					<div class="checkbox">
						<label><input type="checkbox"> Запамятати</label>
					</div>
					<input class="btn btn-default" type="submit" value="Надіслати"/>
				</form>
				<script type='text/javascript'>

					var frmvalidator  = new Validator("login");
					frmvalidator.EnableOnPageErrorDisplay();
					frmvalidator.EnableMsgsTogether();

					frmvalidator.addValidation("username","req","Please provide your username");
					
					frmvalidator.addValidation("password","req","Please provide the password");

				</script>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Вихід</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade text-left" id="mySignUp" role="dialog">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Реєстрація</h4>
			</div>
			<div class="modal-body">
				<form id='register' action = "index.php?action=save_user" method = "POST" role="form">
					<div class="form-group">
						<label for='name' >Нікнейм: </label>
						<input type='text' name='name' id='name' maxlength="50" class="form-control">
						<span id="register_name_errorloc" class="error"></span>
					</div>
					<div class="form-group">
						<label for='email' >Електронна адреса:</label>
						<input type='text' name='email' id='email'  maxlength="50" class="form-control">
						<span id='register_email_errorloc' class='error'></span>
					</div>
					<div class="form-group">
						<label for='sex' >Стать:</label><br/>
						<input type = "radio" name = "gender" value = "woman" > Жін.
						<input type = "radio" name = "gender" value = "man" checked = "checked"> Чол.
					</div>
					<div class="form-group">
						<label for='password' >Пароль:</label>
						<input type='password' name='password' id='password' maxlength="50" class="form-control"> 
						<span id='register_email_errorloc' class='error'></span>
					</div>
					<div class="form-group">
						<label for='password_again' >Пароль знову:<label>
						
					</div>
					<div class="form-group">
						<input type='password' name='password_again' id='password_again'  maxlength="50" class="form-control">
						<span id='register_email_errorloc' class='error'></span>
					</div>
					<input class="btn btn-default" type="submit" value="Надіслати"/>
				</form>
				<script type='text/javascript'>
					var pwdwidget = new PasswordWidget('thepwddiv','password');
					pwdwidget.MakePWDWidget();
					
					var frmvalidator  = new Validator("register");
					frmvalidator.EnableOnPageErrorDisplay();
					frmvalidator.EnableMsgsTogether();
					frmvalidator.addValidation("name","req","Please provide your name");

					frmvalidator.addValidation("email","req","Please provide your email address");

					frmvalidator.addValidation("email","email","Please provide a valid email address");

					frmvalidator.addValidation("username","req","Please provide a username");
					
					frmvalidator.addValidation("password","req","Please provide a password");
					
					frmvalidator.addValidation("password_again","req","Please provide a password");

				</script>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Вихід</button>
			</div>
		</div>
	</div>
</div>

