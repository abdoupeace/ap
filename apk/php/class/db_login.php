<?php
/**
* 
*/
class DBLogin {
	public $bdd;

	function __construct(){

		if (file_exists("class/settings.ini")) {//checke if setting file of the database exist  
			$auth = parse_ini_file("settings.ini");
			foreach ($auth as $k => $v) {
				if ($k == "DB_SERVER") {
					$mysql_host = $v;
				}elseif ($k == "DB_NAME") {
					$mysql_database = $v;
				}elseif ($k == "DB_USER") {
					$mysql_user = $v;
				}elseif ($k == "DB_PASS") {
					$mysql_pass = $v;
				}
				
			}
			$GLOBALS['bdd'] = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database,$mysql_user,$mysql_pass);		
			$GLOBALS['bdd']->query("SET NAMES 'utf8'");
		}else {
			echo "the database is not setup";
			//setup the database
		}

	}//constructeur end
}



?>