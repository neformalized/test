<div id="zform">
	<form action="?controller=def/home&act=done" method="POST">
		
		<div id="name">
			<a><?=$inputName?></a>
			<input type="text" name="name" value="" onchange="check();">
		</div>
		
		<div id="email">
			<a><?=$inputEmail?></a>
			<input type="text" name="email" value="" onchange="check();">
		</div>
		
		<div id="state">
			<a><?=$selectState?></a>
			<select name="state" onchange="loader(this.value, 1); check();">
			<option></option>
			<?php
			foreach($states AS $state){
			?>
				<option value="<?=$state['ter_id']?>"><?=$state['ter_name']?></a>
			<?php
			}
			?>
			</select>
		</div>
		
		<div id="region">
			<a><?=$selectRegion?></a>
			<select name="region" onchange="loader(this.value, 2); check();">
			<option></option>
			</select>
		</div>
		
		<div id="territory" onchange="check();">
			<a><?=$selectTerritory?></a>
			<select name="territory">
			<option></option>
			</select>
		</div>
		
		<div id="submit">
			<input type="submit" value="<?=$buttonSubmit?>">
		</div>
		
	</form>
</div>