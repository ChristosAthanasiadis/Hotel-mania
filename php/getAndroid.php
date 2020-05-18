  <?php
   
 include_once 'db-connect.php';

$db = new DbConnect();

$sql = "SELECT * FROM hotels WHERE id_owner='".$_GET['id']. "'";

$result = mysqli_query($db->getDb(),$sql); 
	
$json = array();

if(mysqli_num_rows($result)){
	
while($row=mysqli_fetch_assoc($result)){
	
$json[]=$row;

}

print_r(json_encode($json,JSON_PRETTY_PRINT));

}


?>