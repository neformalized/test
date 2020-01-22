<?php

define('DIR_ROOT', dirname(__FILE__));
define('DIR_SYS', DIR_ROOT.'/system/');

//

define('DIR_CONTROLLER_SHORT', '/application/controller/');
define('DIR_MODEL_SHORT', '/application/model/');
define('DIR_VIEW_SHORT', '/application/view/');
define('DIR_LANG_SHORT', '/application/lang/');

//

define('DIR_CONTROLLER', DIR_ROOT.DIR_CONTROLLER_SHORT);
define('DIR_MODEL', DIR_ROOT.DIR_MODEL_SHORT);
define('DIR_VIEW', DIR_ROOT.DIR_VIEW_SHORT);
define('DIR_LANG', DIR_ROOT.DIR_LANG_SHORT);

//

require_once(DIR_ROOT.'/db.php');
require_once(DIR_SYS.'starter.php');