<?php 
	
  session_start();  
  //include("db-connect.php");
  include_once 'db-connect.php';
 

  $db = new DbConnect();
        
 $upload_path = 'uploads/';
 
 //Getting the server ip 
 $server_ip = gethostbyname(gethostname());
 
 //creating the upload url 
 $upload_url = 'http://'.$server_ip.'/php/'.$upload_path; 

 
 if($_SERVER['REQUEST_METHOD']=='POST'){

 //checking the required parameters from the request 
 if(isset($_POST['name']) and isset($_FILES['image']['name'])){
 
 //connecting to the database 
 //$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
 
 //getting name from the request 
 $name = $_POST['name'];
 $address = $_POST['address'];
 $city = $_POST['city'];
 $room = $_POST['room'];
 $state = $_POST['state'];
 $zip = $_POST['zip'];
 $wifi = $_POST['wifi'];
 $heating = $_POST['heating'];
 $coolling = $_POST['coolling'];
 $id_owner = $_SESSION['id'];
 $price = $_POST['price'];
 //getting file info from the request 
 $fileinfo = pathinfo($_FILES['image']['name']);
 
 $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    
//Check extension

//Convert image to base64
$encoded_image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
$encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;
 //getting the file extension 
 $extension = $fileinfo['extension'];
 
 //file url to store in the database 
 $file_url = $upload_url . getFileName() . '.' . $extension;
 
 //file path to upload in the server 
 $file_path = $upload_path . getFileName() . '.'. $extension; 
 
  
 //trying to save the file in the directory 
 try{
 //saving the file 
 move_uploaded_file($_FILES['image']['tmp_name'],$file_path);

 $sql = "INSERT INTO `hotels` (`id`,`id_owner`, `url`,`image`, `name`, `address`, `city`, `room`, `state`, `zip`, `wifi`, `heating`, `coolling`, `prove`, `mainrooms`,`price`) 
 VALUES (NULL,  '$id_owner' , '$file_url', '$encoded_image','$name','$address', '$city','$room', '$state','$zip', '$wifi','$heating', '$coolling', 0 ,'$room', '$price');";

 //adding the path and name to database 
 if(mysqli_query($db->getDb(),$sql)){
	 
 header("Location: ../hotelier/uploadHotelier.php");
	exit();
 }
 //if some error occurred 
 }catch(Exception $e){
	 
 header("Location: ../hotelier/uploadHotelier.php");
	exit();
 } 
 
 
 //closing the connection 
 mysqli_close($db->getDb());
 }else{
  
header("Location: ../hotelier/uploadHotelier.php");
	exit();
 }
 }
 
 /*
 We are generating the file name 
 so this method will return a file name for the image to be upload 
 */
 function getFileName(){
 //$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
include_once 'db-connect.php';
$db = new DbConnect();
 $sql = "SELECT max(id) as id FROM hotels";
 $result = mysqli_fetch_array(mysqli_query($db->getDb(),$sql));
 
 mysqli_close($db->getDb());
 if($result['id']==null)
 return 1; 
 else 
 return ++$result['id']; 
 }