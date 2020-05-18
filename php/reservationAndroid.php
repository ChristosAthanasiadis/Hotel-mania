<?php
    session_start(); 
    
    include_once 'db-connect.php';
 
	$db = new DbConnect();
	
	$id_hotel = "";
				
	$id_customer = "";			
	
	$dateIn = "";
					
	$dateLe = "";
	
	if(isset($_POST['id_hotel'])){
		
		$id_hotel = $_POST['id_hotel'];  // Storing Selected Value In Variable
		
	}
 
	if(isset($_POST['dateIn'])){
		
		$dateIn = date('Y-m-d',strtotime($_POST['dateIn'])); // Storing Selected Value In Variable
		
	}
    
    if(isset($_POST['dateLe'])){
        
        $dateLe = date('Y-m-d',strtotime($_POST['dateLe']));
        
    }
	
	if(isset($_POST['id_customer'])){
        
        $id_customer = $_POST['id_customer'];
        
    }
    
	$sql = "SELECT * FROM reservation WHERE startDate<='$dateIn' AND endDate>='$dateLe'";

    $result = mysqli_query($db->getDb(),$sql); 
    
	$num_rows = mysqli_num_rows($result);
	echo $num_rows;
	if($num_rows == 0){
		$query = "insert into reservation(id, id_hotel, startDate, endDate, user_id) values (NULL, '$id_hotel', '$dateIn', '$dateLe', '$id_customer');";

		mysqli_query($db->getDb(), $query);
		$query = "";
		$query = "UPDATE hotels SET mainrooms = mainrooms - 1 WHERE id = '$id_hotel'";

		mysqli_query($db->getDb(), $query);
		
		echo "Your Reservation is Checked";
	}else{
		echo "Your Reservation is not";
		}
   

    die();
?>