<form id="reg" action="/test/?controller=UltraForm&fnc=index" method="POST">
	
	<a>ФИО:</a>
	<input id="fio" type="text" name="fio" value="">
	
	<a>Email:</a>
	<input id="email" type="text" name="email" value="">
	
	<a>Область:</a>
	
	<select id="selectstate" onchange="loader(this.value, 1)">
		<option></option>
		<?php
		foreach($states AS $state){
		?>
		<option value="<?=$state['ter_id']?>"><?=$state['ter_name']?></option>
		<?php
		}
		?>
	</select>
	
	<div id="citys">
		<a>Город/Район:</a>
		
		<select id="selectcity" onchange="loader(this.value, 2)">
			<option></option>
		</select>
	</div>
	
	<div id="locations">
		<a>Территория:</a>
	
		<select id="selectlocation" name="territory">
			<option></option>
		</select>
	</div>

	<a id="submit" onclick="registration()">BUTTON</a>
	
</form>