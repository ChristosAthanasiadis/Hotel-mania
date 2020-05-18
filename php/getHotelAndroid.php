<?php
    
   include_once 'db-connect.php';
 
	$db = new DbConnect();

    $sql = "SELECT * FROM hotels WHERE id_owner='".$_GET['id']."'";

    $result = mysqli_query($db->getDb(),$sql); 
    
    $rows = array();

    while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
    }
   
   echo'{"Hotels":'.json_encode($rows).'}';

    die();
?>