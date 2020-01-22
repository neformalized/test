<?php

require_once(DIR_SYS.'core/model.php');
require_once(DIR_SYS.'core/view.php');
require_once(DIR_SYS.'core/controller.php');
require_once(DIR_SYS.'core/bundle.php');
require_once(DIR_SYS.'core/route.php');

require_once(DIR_SYS.'tool/db.php');
require_once(DIR_SYS.'tool/request.php');
require_once(DIR_SYS.'tool/import.php');

//

$db = new DB($host, $user, $pass, $base);

$bundle = new Bundle();

$bundle->append('db', $db->db);
$bundle->append('request', new Request());
$bundle->append('import', new Import($bundle));

//

$route = new Route($bundle);
$route->work();