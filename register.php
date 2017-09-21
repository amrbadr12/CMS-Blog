<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php 
//adding a user to the database
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email_address=$_POST['email_address'];
    $errorMsg="";
    $counter=0;
    $user_registered="true";
    
    if($username==""||$password=""||$confirm_pass=""||$email=""){
        foreach($_POST as $key => $value){
            if($value=="")
          $counter=$counter+1;
           
        }
       
        
        }
        
    else{
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    $confirm_pass=mysqli_real_escape_string($connection,$confirm_pass);
    $fname=mysqli_real_escape_string($connection,$fname);
    $lname=mysqli_real_escape_string($connection,$lname);
    $email=mysqli_real_escape_string($connection,$email);
   $password_hashed=password_hash($password, PASSWORD_BCRYPT,array('cost'=>10));
        
  
    if($password===$confirm_pass){
    $insert_user_query="INSERT INTO users(username,password,email,fname,lname,role)";
    $insert_user_query.="VALUES('{$username}','{$password_hashed}','{$email_address}','{$fname}','{$lname}','user')";
    $insert_new_user=mysqli_query($connection,$insert_user_query);
    $user_registered="true";
    }
        else if($password!=$confirm_pass){
            $user_registered="false";
            echo "<p class='col-md-3 col-md-offset-3 bg-danger'> Please match password with confirm password field. </p>";
        }
    
    }
}



?>
    

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
<section id="login">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="register.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                            
                             <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm" class="sr-only">Confirm Password</label>
                            <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirm Password">
                        </div>
                    
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" name="email_address" placeholder="Email">
                        </div>
                        
                         <div class="form-group">
                            <label for="fname" class="sr-only">First name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                        </div>
                        
                        <div class="form-group">
                            <label for="lname" class="sr-only">Last name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                        </div>
                        
                        
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                    <?php
                if(isset($_POST['register'])&&$counter!=0){
                    echo $counter." fields are empty. Please fill them";
                }
                if(isset($_POST['register'])&&$counter==0){
                if($user_registered=="false"){
                     echo "<p class=' bg-danger'> Please match password with confirm password field. </p>";
                }
                else if($user_registered=="true"){
                     echo "<p class=' bg-success'> Registeration was successful! </p>";
                }
                }
                
                ?>
                     
                
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
