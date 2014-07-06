<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));
		
// Auto Load of Zend_Db_Adapter_Pdo_Mysql, et instanciation.
require_once 'Zend/Config/Ini.php';
 $config = new Zend_Config_Ini('./application/configs/application.ini', 'production');

// loading database information Database
require_once 'Zend/Db.php'; 
$db = Zend_Db::factory($config->db->adapter,array( 
'host' => $config->db->params->host,
 'username' => $config->db->params->username, 
 'password' => $config->db->params->password, 
 'dbname' => $config->db->params->dbname, ) 
 );
 
 $db->setFetchMode(Zend_Db::FETCH_OBJ);
 $db->query('SET NAMES UTF8');
 require_once 'Zend/Db/Table.php';
 Zend_Db_Table::setDefaultAdapter($db);
 /** registry */
require_once 'Zend/Registry.php';
 $registry = Zend_Registry::getInstance();
 $registry->set('db', $db); 
 
 /** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
			