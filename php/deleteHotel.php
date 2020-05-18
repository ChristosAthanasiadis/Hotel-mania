  <?php
   
 include_once 'db-connect.php';

$db = new DbConnect();

$sql = "DELETE FROM `hotels` WHERE id='".$_GET['id']. "'";

$result = mysqli_query($db->getDb(),$sql); 
	    
if(! $result ) {
   echo "<script>alert('Could not delete data: ' . mysql_error());</script>";
   echo "<script>setTimeout(\"location.href = '../admin/hotelsAdmin.php';\",500);</script>";
}

echo "<script>alert('Deleted data successfully');</script>";
"<script>setTimeout(\"location.href = '../admin/hotelsAdmin.php';\",500);</script>";

mysql_close($conn)


?>