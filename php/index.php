<?php
    
    require_once 'user.php';
    
    $username = "";
    
    $password = "";
    
	$firstName = "";
	 
	$lastName = "";
	  
    $address = "";
   
    $email = "";
	
	$type = 0;
	
	$user_type ="";
	
	if(isset($_POST['radio'])){
		
		$user_type = $_POST['radio'];  // Storing Selected Value In Variable
		
	}
    
    if(isset($_POST['username'])){
        
        $username = $_POST['username'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }
	
	if(isset($_POST['firstName'])){
		
		$firstName = $_POST['firstName'];  // Storing Selected Value In Variable
		
	}
	
	if(isset($_POST['lastName'])){
		
		$lastName = $_POST['lastName'];  // Storing Selected Value In Variable
		
	}
	
	if(isset($_POST['address'])){
		
		$address = $_POST['address'];  // Storing Selected Value In Variable
		
	}
	
	if(isset($_POST['type'])){
        
        $type = $_POST['type'];
        
    }
    
    
    
    $userObject = new User();
    
    // Registration
    
    if(!empty($username) && !empty($password) && $type == 0){
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $email, $firstName, $lastName, $address, $user_type);
        
        echo json_encode($json_registration);
        
    }else{// Login
        
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($username, $hashed_password, $user_type);
        
        echo json_encode($json_array);
    }
    ?>