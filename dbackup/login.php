<?php  
session_start();//session starts here  

require_once("config.php");

if((isset($_POST['user_name'])&& $_POST['user_name'] !='') && (isset($_POST['pass'])&& $_POST['pass'] !=''))
{ 

        $user_name = $_POST['user_name'];  
        $user_pass = $_POST['pass'];
        $user_type = $_POST['userType'];  
        $sql = '';

        if($user_type === 'admin'){
            $sql = "select * from admins WHERE username='$user_name'AND password='$user_pass'";  
        }else{
            $sql = "select * from student WHERE am='$user_name'AND password='$user_pass'";
        }

        $result = $conn->query($sql);
      
        if($result->num_rows > 0 && $user_type==='admin' )  
        {  
            echo "<script>window.open('../adminfiles/welcomeAdmin.php','_self')</script>";  
      
           $_SESSION['user_name']=$user_name;//here session is used and value of $user_email store in $_SESSION.  
      
        } 
        else if($result->num_rows > 0 && $user_type==='user' )  
        {  
            $followingdata = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['first_name'] = $followingdata['first_name'];
            $_SESSION['am'] = $user_name;

             echo "<script>window.open('../userfiles/welcomeStudent.php','_self')</script>";  
           //here session is used and value of $user_email store in $_SESSION.  
            
        }  
        else  
        {  
          echo "<script>alert('Email or password is incorrect!')</script>";  
          echo "<script>window.open('index.html','_self')</script>";
        }  
}
else  
{  
    echo "<script>alert('Email or password is incorrect!')</script>";  
    echo "<script>window.open('index.html','_self')</script>";
}   
    ?>  
