<!-- Deleting Users -->
                    
                    <?php

                            //delete users 

                            if(isset($_GET['delete'])){
                            $delete_id=$_GET['delete'];
                            $deleteQuery="DELETE FROM users WHERE user_id={$delete_id}";
                            $delete_user_query=mysqli_query($connection,$deleteQuery) or die("QUERY FAILED!");
                        
                            }

                            //change user roles(admin,user)

                            if(isset($_GET['to_admin'])){
                            $admin_id=$_GET['to_admin'];
                            $toAdminQuery="UPDATE users SET role='admin' WHERE user_id={$admin_id}";
                            $change_to_admin_query=mysqli_query($connection,$toAdminQuery) or die("QUERY FAILED!".mysqli_error($connection));
                        
                            }

                            if(isset($_GET['to_user'])){
                            $user_id=$_GET['to_user'];
                            $toUserQuery="UPDATE users SET role='user' WHERE user_id={$user_id}";
                            $change_to_user_query=mysqli_query($connection,$toUserQuery) or die("QUERY FAILED!");
                        
                            }


                    ?>
                     

                     
                     
                     
                     
                     
                     <!--                        view users               -->
                      <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>User ID</td>
                                    <td>Username</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email Address</td>
                                    <td>Image</td>
                                    <td>Role</td>
                                    <td>Admin</td>
                                    <td>User</td>
                                    <td>Edit User</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                               <!-- Viewing the users-->
                                <?php 
                                $query="SELECT * FROM users";
                                $viewSQLQuery=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($viewSQLQuery)){
                                    $user_id=$row['user_id'];
                                    echo "<tr>";
                                    echo"<td>   {$row['user_id']}    </td>";
                                    echo"<td>   {$row['username']}     </td>";
                                    echo"<td>   {$row['fname']} </td>";
                                    echo"<td>   {$row['lname']}     </td>";
                                    echo"<td>   {$row['email']}    </td>";
                                    echo"<td>   {$row['user_image']}    </td>";
                                    echo"<td>   {$row['role']}    </td>";
                                    echo"<td>   <a href='users.php?url=view_users&to_admin={$user_id}'>Admin</a>    </td>";
                                    echo"<td>   <a href='users.php?url=view_users&to_user={$user_id}'>User</a>    </td>";
                                    echo"<td>   <a href='users.php?url=edit_users&edit_id={$user_id}'>Edit</a>    </td>";
                                    echo"<td>   <a href='users.php?url=view_users&delete={$user_id}'>Delete</a>    </td>";
                                    echo"</tr>";
                                }

                                ?>
                            </tbody>
                                                        
                        </table>
                        