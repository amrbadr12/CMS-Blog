<?php include "db.php";?>
<?php session_start();?>

<?php
  
    if(isset($_POST['submit'])){
        
//        $db_password="";
        $db_username="";
        $db_userrole="";
    //entered username and password from the form
    $username=$_POST['username'];
    $enteredpassword=$_POST['user_password'];
    //prevent SQL injection
    $username=mysqli_real_escape_string($connection,$username);
    $enteredpassword=mysqli_real_escape_string($connection,$enteredpassword);
        
    if($username==null||$enteredpassword==null)
    {
        header("Location:../index.php");
        die();
    }
    
    $query="SELECT * FROM users WHERE username='{$username}'";
    $loginQuery=mysqli_query($connection,$query);
        
        if(mysqli_num_rows($loginQuery)==0){
            header("Location:../index.php?login=failed");
        }
else{
    
    while($row=mysqli_fetch_assoc($loginQuery)){
        $db_password=$row['password'];
        $db_username=$row['username'];
        $db_userrole=$row['role'];
        $db_fname=$row['fname'];
        $db_lname=$row['lname'];
    }

       if(password_verify($enteredpassword,$db_password)){
            $_SESSION['username']=$db_username;
            $_SESSION['fname']=$db_fname;
            $_SESSION['lname']=$db_lname;
            $_SESSION['role']="user";
            echo "password correct";
            header("Location: ../admin.php");
        }
    else if(!password_verify($enteredpassword,$db_password)){
        echo "password not correct";
        echo $db_password;
    }
        
    }
    }
    

    ?>



