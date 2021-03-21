<?php 
## no arquivo config sera criado uma serie de configurações basicas da aplicação  e uma serie de constantes que ira ajudar 
## a acessar as pastas de uma forma mais tranquila
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME,'pt-br');

// Constantes Gerais 
define('DAILY_TIME',60*60*8);

//Pastas 

define('MODEL_PATH',realpath(dirname(__FILE__).'/../models'));
define('VIEW_PATH',realpath(dirname(__FILE__).'/../views'));
define('TEMPLATE_PATH',realpath(dirname(__FILE__).'/../views/template')); 
define('CONTROLLER_PATH',realpath(dirname(__FILE__).'/../controllers'));
define('EXCEPTION_PATH',realpath(dirname(__FILE__).'/../exceptions'));


##carregando arquivo de banco de dados
require_once(realpath(dirname(__FILE__). '/database.php' ));
require_once(realpath(dirname(__FILE__). '/loader.php' ));
require_once(realpath(dirname(__FILE__). '/session.php' ));
require_once(realpath(dirname(__FILE__). '/date_util.php' ));
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(MODEL_PATH . '/User.php'));
require_once(realpath(EXCEPTION_PATH. '/AppException.php'));
require_once(realpath(EXCEPTION_PATH. '/ValidationException.php')); 


?>