<?php
if(isset($_POST['edit_status'])){
    $post_stat=$_POST['post_status'];
    $posts_edited=0;
    foreach($_POST['checkBoxArray'] as $checkBoxValues){
        $edit_status_query="UPDATE posts set post_status='{$post_stat}' WHERE post_id={$checkBoxValues}";
        $edit_status=mysqli_query($connection,$edit_status_query);
        $posts_edited=$posts_edited+1;
    }
    showNotification($posts_edited." posts edited ");
    
}

if(isset($_POST['delete_bulk'])){
    $posts_deleted=0;
    foreach($_POST['checkBoxArray'] as $checkBoxValues){
       $delete_posts_query="DELETE FROM posts WHERE post_id={$checkBoxValues}";
        $delete_posts=mysqli_query($connection,$delete_posts_query);
        $posts_deleted=$posts_deleted+1;
    }
    if($posts_deleted==1){
        $msg=$posts_deleted." post deleted ";
    }
    else{
         $msg=$posts_deleted." posts deleted ";
    }
    showNotification($msg);
}

?>
                            <table class="table table-bordered table-hover">
                            <div class="row">
                      <div class="col-md-4">
                   <form action="" method="post">
                    <select name="post_status">
                 <option value="published">published</option>
                <option value="draft">draft</option>
                </select>
                 <button class="btn btn-success btn-sm" name="edit_status"> Edit Status</button>
                 <button class="btn btn-danger btn-sm" name="delete_bulk"> Delete Posts</button>
    
                </div> 
                </div>
                             <br>
                            <thead>
                                <tr>
                                   <td></td>
                                    <td>Post Id</td>
                                    <td>Author</td>
                                    <td>Title</td>
                                    <td>Cateogory ID</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Tags</td>
                                    <td>Comments</td>
                                    <td>Date</td>
                                    <td>Delete</td>
                                    <td>Edit</td>
                                </tr>
                            </thead>
                            <tbody>
                               <!-- Viewing the posts -->
                                <?php 
                                $query="SELECT * FROM posts";
                                $viewSQLQuery=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($viewSQLQuery)){
                                    $post_id=$row['post_id'];
                                    echo "<tr>";
                                    echo "<td> <input type='checkbox' class='checkboxes' name='checkBoxArray[]' value={$post_id} </td>";
                                    echo"<td>   {$row['post_id']}    </td>";
                                    echo"<td>   {$row['post_author']}     </td>";
                                    echo"<td><a href='../view_post.php?p_id={$post_id}'>{$row['post_title']}</a> </td>";
                                    echo"<td>   {$row['post_category_id']} </td>";
                                    echo"<td>   {$row['post_status']}     </td>";
                                    //TODO fix the image
                                    echo"<td>   <img src='../../images{$row['post_image']}'>     </td>";
                                    echo"<td>   {$row['post_tags']}    </td>";
                                    //display comment count dynmacially
                                    
                                    echo"<td>   {$row['post_comment_count']}    </td>";
                      
                                    echo"<td>   {$row['post_date']}    </td>";
                                    $delete_id=$row['post_id'];
                                    echo"<td><a href='posts.php?delete_id={$delete_id}'>Delete</a></td>";
                                     echo"<td><a href='edit_post.php?post_edit_id={$delete_id}'>Edit Post </a></td>";
                                    echo"</tr>";
                                }

                                ?>
                            </tbody>
                                </form>                            
                        </table>
                        
                        <!-- Deleting a record-->
                        <?php
    if(isset($_GET['delete_id'])){
    $deleteQuery="DELETE FROM posts WHERE post_id=".$_GET['delete_id'];
    if(mysqli_query($connection,$deleteQuery)){
        echo "query deleted!";
        header("location:posts.php");
    }
    else{
        echo "query failed to delete!";
    }
    
}
?>
                        