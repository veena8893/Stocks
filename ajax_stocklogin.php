<?php
	session_start();
	require_once('include/connection.php');
	if(isset($_POST['username']) and $_POST['username']!='' and isset($_POST['password']) and $_POST['password']!='')
	{
		$array = array();
		$uname=$_POST['username'];
		$sql="select uname,pwd from Login where uname=:uname";
		$stmt=$db->prepare($sql);
		$stmt->execute(array(':uname'=>$_POST['username']));
		$r=$stmt->fetch(PDO::FETCH_ASSOC);
		if(isset($r['pwd']) and $r['pwd']!='')
		{
			$hashed = $r['pwd'];
			if(password_verify($_POST['password'],$hashed))
			{
				echo "1";
			}
			else
			{
				echo "2";
			}
		}
		else
		{
			echo "3";
		}
	}
?>
