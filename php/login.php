<?php
    session_start();//session starts here 
    require_once 'user.php';
   
    $username = "";
    
    $password = "";
    
    $email = "";
	
	$firstname = "";
	
	$user_type = "";
	
	$lastname = "";
	
	$address = "";
	
	$type = 0;

	
	if(isset($_POST['radio'])){
		
		$user_type = $_POST['radio'];  // Storing Selected Value In Variable
		
	}
    
    if(isset($_POST['username'])){
        
        $username = $_POST['username'];
        
    }
	
	if(isset($_POST['type'])){
        
        $type = $_POST['type'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }
    
	if(isset($_POST['firstname'])){
        
        $firstname = $_POST['firstname'];
        
    }
	
	if(isset($_POST['lastname'])){
        
        $lastname = $_POST['lastname'];
        
    }
	
	if(isset($_POST['address'])){
        
        $address = $_POST['address'];
        
    }
    
    $userObject = new User();
    $parent = dirname($_SERVER['REQUEST_URI']);
	
	
    // Registration
    if($type == 1){
		
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $email, $firstname, $lastname, $address, $user_type);
       
		echo '<script type="text/javascript">alert("' . $json_registration['message'] . '")</script>';
		echo "<script>setTimeout(\"location.href = '../index.html';\",500);</script>";
		//header("Location: ../index.html");
        
    }else{
    
    // Login
   
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($username, $hashed_password, $user_type);
		
		$_SESSION['id'] = $json_array['id'];
        $_SESSION['username'] = $json_array['username'];
		$_SESSION['email'] = $json_array['email'];
		$_SESSION['user_type'] = $json_array['user_type'];
		
		if($json_array['user_type'] == "Hotelier"){
		 header("Location: ../hotelier/mainHotelier.php"); 
		}else if($json_array['user_type'] == "Admin"){
		 header("Location: ../admin/mainAdmin.php"); 
		}else{
		 header("Location: ../customer/mainCustomer.php"); 	
		}
		
    }
	
    ?>