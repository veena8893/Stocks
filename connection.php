<?php
try
{
	$db = new PDO("mysql:host=sql6.freemysqlhosting.net;dbname=sql6428206",'sql6428206','6QKh7iNhRN');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->exec("set sql_mode=''");
}
catch(PDOException $e) { echo "Error " . $e->getCode() . "<!--" . $e->getMessage() . "-->"; die(); }

class DB
{
  function get_connection()
  {
    try
    {
			$db = new PDO("mysql:host=sql6.freemysqlhosting.net;dbname=sql6428206",'sql6428206','6QKh7iNhRN');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->exec("set sql_mode=''");
    }
    catch(PDOException $ex)
    {
			echo 'An Error occured! '.$ex->getMessage(); //user friendly message
			error_log('dbconn.php failed to connect to db - Exception caught: '.$ex->getMessage());
			return false;
    }
    return $db;
  }
}
?>
