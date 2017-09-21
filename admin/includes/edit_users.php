<?php

//displaying the old data on the page 
 $user_id=$_GET['edit_id'];
    if(isset($_GET['edit_id'])){
    $selectUsers="SELECT * FROM users WHERE user_id={$user_id}";
    $selectUsersQuery=mysqli_query($connection,$selectUsers) or die("QUERY FAILED".mysqli_error($connection));
    while($row=mysqli_fetch_assoc($selectUsersQuery)){
        $username=$row['username'];
        $password=$row['password'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $user_role=$row['role'];
    }
}

                if(isset($_POST['edit_user'])){
                    $user=$_POST['username'];
                    $pass=$_POST['password'];
                    $first_name=$_POST['fname'];
                    $last_name=$_POST['lname'];
                    $email_address=$_POST['user_email'];
                    $role=$_POST['user_role'];
                    $image=$_FILES['user_image']['name'];
                    $post_image_temp=$_FILES['user_image']['tmp_name'];
                    if(isset($image)){
                    move_uploaded_file($post_image_temp,"../images/'{$image}'");
                    }
                    $update_users="UPDATE users SET username='{$user}',password='{$pass}'
                    ,fname='{$first_name}',lname='{$last_name}',email='{$email_address}',
                    role='{$role}',user_image='{$image}' WHERE user_id={$user_id}"; 
                    $updateUsers=mysqli_query($connection,$update_users) or die("query failed!".mysqli_error($connection));
            
}




?>
  
  
  
  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
       <label for="username">Username</label>
        <input type="text" name="username" value=<?php echo $username?> class="form-control">
    </div>
    <div class="form-group">
       <label for="password">Password</label>
        <input type="password" name="password" value=<?php echo $password?> class="form-control">
    </div>
     
      <div class="form-group">
       <label for="fname">First Name</label>
        <input type="text" name="fname" value=<?php echo $fname?> class="form-control">
    </div>
    
    <div class="form-group">
       <label for="lname">Last Name</label>
       <input type="text" name="lname" value=<?php echo $lname?> class="form-control">
    </div>

      <div class="form-group">
       <label for="role">Email</label>
        <input type="text" name="user_email" value=<?php echo $email?> class="form-control">
    </div>
       <div class="form-group">
       <label for="role">Role</label><br>
        <select name="user_role" id="">
       <?php
    $other="";
    if($user_role=="admin"){
        echo "<option value='admin'>Admin</option> ";
        $other="user";
        
    }
               else{
                   echo "<option value='user'>User</option> ";
                   $other="admin";
               }
              echo "<option value='{$other}'>{$other}</option> "; 
    
    ?>
         
         </select>
    </div>
    
       <div class="form-group">
       <label for="user_image">Image</label>
        <input type="file" name="user_image" class="form-control">
    </div>
    
  

    <div class="form-group">
        <input type="submit" name="edit_user" class="btn btn-primary" value="Edit User">
    </div>
    <?php    
            if(isset($_POST['edit_user']))
             showNotification(" User edited ");
       ?>
   </form>