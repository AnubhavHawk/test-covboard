<?php
	session_start();
	if(!isset($_REQUEST['submit']))
		die("access denied");
	print_r($_REQUEST);
	include("db_connection.php");
	$sql = "SELECT project_id FROM project WHERE project_code = '".$_REQUEST['project_code']."' AND project_password = '".$_REQUEST['project_password']."'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['project_id'] = $row['project_id'];
		$_SESSION['project_code'] = $_REQUEST['project_code'];
		$l = "location:../covboard/".$_REQUEST['project_code'];
		header($l);
	}
	else
	{
		$l = "location:../enter/".$_REQUEST['project_code']."/fail";
		header($l);
	}
?>