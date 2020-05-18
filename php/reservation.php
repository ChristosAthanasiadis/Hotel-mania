<?php
    session_start(); 
    
    include_once 'db-connect.php';
 
	$db = new DbConnect();
	
	$id = "";
					
	$dateIn = "";
					
	$dateLe = "";
	
	if(isset($_POST['id'])){
		
		$id = $_POST['id'];  // Storing Selected Value In Variable
		
	}
 
	if(isset($_POST['dateIn'])){
		
		$dateIn = date('Y-m-d',strtotime($_POST['dateIn']));;  // Storing Selected Value In Variable
		
	}
    
    if(isset($_POST['dateLe'])){
        
        $dateLe = date('Y-m-d',strtotime($_POST['dateLe']));;
        
    }
    
	$sql = "SELECT * FROM reservation WHERE startDate<='$dateIn' AND endDate>='$dateLe' AND id_hotel='$id'"; /// add id hotel

    $result = mysqli_query($db->getDb(),$sql); 
    
	$num_rows = mysqli_num_rows($result);
	
	if($num_rows == 0){
		$query = "insert into reservation(id, id_hotel, startDate, endDate, user_id) values (NULL, '$id', '$dateIn', '$dateLe', '".$_SESSION['id']."');";

		mysqli_query($db->getDb(), $query);
		$query = "";
		$query = "UPDATE hotels SET mainrooms = mainrooms - 1 WHERE id = '$id' AND mainrooms >=0"; // addd AND mainrooms >=0
		
		if(mysqli_query($db->getDb(), $query)){
			$query = "SELECT price FROM hotels WHERE id ='$id'";
			$result = mysqli_query($db->getDb(), $query);
			$row = mysqli_fetch_assoc($result);
			//echo $row['price'];
			echo json_encode($row['price']);//'{"message":"succes","price":'.json_encode($row).'}'; 
			//echo "Your Reservation is Checked";	
		}else{
			echo '{"message":"error","mess":"Your Reservation is not"}';
		}
	}else{
			echo '{"message":"error","mess":"Your Reservation is not"}';
		}
   

    die();
?>