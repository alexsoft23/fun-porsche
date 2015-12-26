	<div id="team" class="container">
	  <h3 class="text-center">Про мене</h3>
	  <p class="text-center"><em>Тварчий підхід і світла голова роблять дива;)</em></p>
	  <p>Цей сайт створений, як навчальний проект в Чернівецькому національному університеті над яким я працюю. Його було створено для всіх українських фанатів автомобілів марки Порш. Для тих хто має такий автомобіль, тих хто має намір придбати і для тих кому просто подобається дане авто. </p>
	  <br>
		<div class="col-sm-4 text-center">
		  <p><strong>Це я</strong></p><br>
		  <a href="#demo1" data-toggle="collapse">
			<img src="sys_img/alex.JPG" class="img-thumbnail" alt="Герасимчук Олександр" width="200" height="200">
		  </a>
		  <div id="demo1" class="collapse">
			<p>Герасимчук Олександр</p>
			<p>Люблю коли все Гут)</p>
		  </div>
		</div>
		<div class="col-sm-8">
		  <p>Данний сайт буде доопрацьовуватися і вдосконалюватися. Всі відгуки і побажання будуть враховані. Якщо є зауваження, побажання та враження то пишіть на пощту або використайте систему зворотнього звязку. Мене цікавить ваша думка.</p>
		</div>
		<div class="col-sm-8 text-center">
		  <p><strong>Зворотній звязок тимчасово непрацює!!!</strong></p>
		</div>
	</div>

	<div id="contact" class="container-fluid bg-grey">
		<h2 class="text-center">Зворотній звязок</h2>
		<div class="row">
			<div class="col-sm-5">
				<p>Ваші побажання, запити чи зауваження відсилайте мені на пошту і я зв'яжуся з вами.</p>
				<p><span class="glyphicon glyphicon-map-marker"></span> Україна, м.Чернівці</p>
				<p><span class="glyphicon glyphicon-phone"></span> +380502482271</p>
				<p><span class="glyphicon glyphicon-envelope"></span> alexsoft23@yahoo.com.ua</p>
			</div>
			<div class="col-sm-7 slideanim">
				<div class="row">
					<div class="col-sm-6 form-group">
						<input class="form-control" id="name" name="name" placeholder="Ваше імя" type="text" required>
					</div>
					<div class="col-sm-6 form-group">
						<input class="form-control" id="email" name="email" placeholder="Ваша електронна пошта" type="email" required>
					</div>
				</div>
				<textarea class="form-control" id="comments" name="comments" placeholder="Введіть ваше повідомлення" rows="5"></textarea><br>
				<div class="row">
					<div class="col-sm-12 form-group">
						<button class="btn btn-default pull-right" type="submit">Надіслати</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="googleMap" style="height:400px;width:100%;"></div>

	<!-- Add Google Maps -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		var myCenter = new google.maps.LatLng(48.2931783,25.9291373);

		function initialize() {
			var mapProp = {
				center:myCenter,
				zoom:12,
				scrollwheel:false,
				draggable:false,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker = new google.maps.Marker({
				position:myCenter,
			});

			marker.setMap(map);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

    </div>
	