<?php
    session_start(); 
    
   include_once 'db-connect.php';
 
	$db = new DbConnect();

    $sql = "SELECT * FROM hotels";

    $result = mysqli_query($db->getDb(),$sql); 
    
    $rows = array();

    while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
    }
    echo json_encode($rows);  

    die();
?>