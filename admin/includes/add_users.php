<?php
if(isset($_POST['add_user'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['user_email'];
    $role=$_POST['user_role'];
    $image=$_FILES['user_image']['name'];
    $image_temp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($image_temp,"../images/'{$image}'");

    $insertUser="INSERT INTO users(username,password,fname,lname,email,user_image,role)";
    $insertUser.="VALUES('{$username}','{$password}','{$fname}','{$lname}','{$email}','{$image}','{$role}')";
    $addUserQuery=mysqli_query($connection,$insertUser) or die("query failed");
}




?>
  
  
  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
       <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
       <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
     
      <div class="form-group">
       <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control">
    </div>
    
    <div class="form-group">
       <label for="lname">Last Name</label>
       <input type="text" name="lname" class="form-control">
    </div>

      <div class="form-group">
       <label for="role">Email</label>
        <input type="text" name="user_email" class="form-control">
    </div>
       <div class="form-group">
       <label for="role">Role</label><br>
       <select name="user_role" id="">
           <option value="admin">Admin</option>
           <option value="user">User</option>
         </select>
    </div>
    
       <div class="form-group">
       <label for="user_image">Image</label>
        <input type="file" name="user_image" class="form-control">
    </div>
    
  

    <div class="form-group">
        <input type="submit" name="add_user" class="btn btn-primary" value="Add User">
    </div>
   </form>
<?php    
            if(isset($_POST['add_user']))
             showNotification(" User added ");
       ?>
    </small>