<?php
    
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
		
		$dateIn = date('d-m-Y',strtotime($_POST['dateIn'])); // Storing Selected Value In Variable
		
	}
    
    if(isset($_POST['dateLe'])){
        
        $dateLe = date('d-m-Y',strtotime($_POST['dateLe']));
        
    }
	
	if(isset($_POST['id_customer'])){
        
        $id_customer = $_POST['id_customer'];
        
    }
    echo $_POST['id_hotel'];
	echo $POST['dateIn'];
	echo $id_hotel;
	echo $id_customer;
	$sql = "SELECT * FROM reservation WHERE startDate<='$dateIn' AND endDate>='$dateLe' AND id_hotel='$id_hotel'"; 
	echo $sql;
    $result = mysqli_query($db->getDb(),$sql); 
    
	$num_rows = mysqli_num_rows($result);
	if($num_rows == 0){
		$query = "insert into reservation(id, id_hotel, startDate, endDate, user_id) values (NULL, '$id_hotel', '$dateIn', '$dateLe', '$id_customer');";
		echo $query;
		mysqli_query($db->getDb(), $query);
		$query = "UPDATE hotels SET mainrooms = mainrooms - 1 WHERE id = '$id_hotel'";
		echo $query;
		if(mysqli_query($db->getDb(), $query)){
			$query = "SELECT price FROM hotels WHERE id ='$id_hotel'";
			$result = mysqli_query($db->getDb(), $query);
			$row = mysqli_fetch_assoc($result);
			//echo $row['price'];
			echo json_encode($row['price']);//'{"message":"succes","price":'.json_encode($row).'}'; 
			//echo "Your Reservation is Checked";	
		}else{
		echo "Error";
		}
	}else{
		echo "Error";
		}
   

    die();
?>