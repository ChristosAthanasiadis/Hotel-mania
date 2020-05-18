  <?php
   
 include_once 'db-connect.php';

$db = new DbConnect();

$sql = "UPDATE `hotels` SET prove=1 WHERE id='".$_GET['id']. "'";

$result = mysqli_query($db->getDb(),$sql); 
	    
if(! $result ) {
   echo "<script>alert('Could not accept data: ' . mysql_error());</script>";
   echo "<script>setTimeout(\"location.href = '../admin/hotelsAdmin.php';\",500);</script>";
}

   echo "<script>alert('Accept hotel successfully');</script>";
   echo "<script>setTimeout(\"location.href = '../admin/hotelsAdmin.php';\",500);</script>";

mysqli_close($db->getDb());


?>