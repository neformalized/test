<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	
	<link rel="stylesheet" href="<?=DIR_VIEW_SHORT.'style/common.css'?>">
	<?php
	if(!empty($styles)){
		foreach($styles AS $style){
		?>
			<link rel="<?=$style['rel']?>" href="<?=DIR_VIEW_SHORT.$style['href']?>">
		<?php
		}
	}
	?>
	
	<script type="text/javascript" src="<?=DIR_VIEW_SHORT.'js/jquery.js'?>"></script>
	<?php
	if(!empty($scripts)){
		foreach($scripts AS $script){
		?>
			<script type="<?=$script['type']?>" src="<?=DIR_VIEW_SHORT.$script['src']?>"></script>
		<?php
		}
	}
	?>

</head>
<body>
	
	<div id="viewport">
		<?php require_once(DIR_VIEW.$path.'.tpl')?>
	</div>
	
</body>
</html>