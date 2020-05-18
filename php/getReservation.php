<?php
    session_start(); 
    
   include_once 'db-connect.php';
 
	$db = new DbConnect();

    $sql = "SELECT id_hotel FROM reservation where user_id='".$_SESSION['id']. "'"; //'".$_SESSION['id']. "'
	
    $result = mysqli_query($db->getDb(),$sql);
	
    $sql = "";
    while($r = mysqli_fetch_assoc($result)) {
    $sql .= "SELECT * FROM hotels WHERE  id='".$r['id_hotel']. "';";
    }
	$rows = array();

	if (mysqli_multi_query($db->getDb(), $sql)) {
		do {
			
			if ($results = mysqli_store_result($db->getDb())) {

				while ($row = mysqli_fetch_assoc($results)){

					$rows[] = $row;
				}
				
				mysqli_free_result($results);
				}   
			} while (mysqli_next_result($db->getDb()));
	}

    echo json_encode($rows);  

    die();
?>