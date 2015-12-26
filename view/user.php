<div class="container text-center">
	<form id='register' action = "index.php?action=user" method = "POST" role="form">
					<div class="form-group col-sm-3">
						<label for='name' >Нікнейм: </label>
						<input type='text' name='name' id='name' maxlength="50" class="form-control" value="ie">
					</div>
					<div class="form-group col-sm-7">
						<label for='name' >Повне ім'я: </label>
						<input type='text' name='name_full' id='name_full' maxlength="50" class="form-control" value="?">
					</div>
					<div class="form-group col-sm-10">
						<label for='email' >Електронна адреса:</label>
						<input type='text' name='email' id='email'  maxlength="50" class="form-control" value="ie">
					</div>
					<div class="form-group col-sm-10">
						<label for='sex' >Стать:</label><br/>
						<input type = "radio" name = "gender" value = "woman" > Жін.
						<input type = "radio" name = "gender" value = "man" checked = "checked"> Чол.
					</div>
					<div class="form-group col-sm-10">
						<label for='password' >Новий Пароль:</label>
						<input type='password' name='New_password' id='New_password' maxlength="50" class="form-control"> 
					</div>
					<div class="form-group col-sm-10">
						<label for='password_again' >Новий Пароль Знову:<label>
					</div>
					<div class="form-group col-sm-10">
						<input type='password' name='password_again' id='password_again'  maxlength="50" class="form-control">
					</div>
					<div class="form-group col-sm-10">
						<label for='password' >Старий Пароль:</label>
						<input type='password' name='password' id='password' maxlength="50" class="form-control"> 
					</div>
					<div class="form-group col-sm-10 text-right">
						<input class="btn btn-default" type="submit" value="Змінити"/>
					</div>
				</form>
</div>
