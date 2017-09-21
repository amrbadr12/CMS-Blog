<?php include "includes/header.php";
include ("includes/admin_functions.php");
    ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                       <h1 class="page-header">
                            Comments
                            <small><?php 
                               showAuthor();?></small>
                        </h1>
                        <!-- Deleting the comments-->
                        <?php
                        if(isset($_GET['delete_id'])){
                        $delete_comment_id=$_GET['delete_id'];
                        $delete_comment="DELETE FROM comments where comment_id=$delete_comment_id";
                        $delete_comment_query=mysqli_query($connection,$delete_comment)or die("Query failed to die".mysqli_error($connection));
                        }
                        
                        //Unapproving the comments
                        
                        if(isset($_GET['unapprove'])){
                        $unapprove_comment_id=$_GET['unapprove'];
                        $unapprove_comment="UPDATE comments SET comment_status='unapproved' WHERE comment_id=$unapprove_comment_id";
                        $unapprove_comment_query=mysqli_query($connection,$unapprove_comment)or die("Query failed to die".mysqli_error($connection));  
                        }
                        
                        //approving the comments
                        
                        if(isset($_GET['approve'])){
                        $approve_comment_id=$_GET['approve'];
                        $approve_comment="UPDATE comments SET comment_status='approved' WHERE comment_id=$approve_comment_id";
                        $approve_comment_query=mysqli_query($connection,$approve_comment)or die("Query failed to die".mysqli_error($connection));  
                        }


                        ?>
                        
                        
<!--                        view comments               -->
                      <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Comment ID</td>
                                    <td>Comment Post ID</td>
                                    <td>Comment Date</td>
                                    <td>Comment Author</td>
                                    <td>Comment Email</td>
                                    <td>Comment Content</td>
                                    <td>In Response to</td>
                                    <td>Comment Status</td>
                                    <td>Approve</td>
                                    <td>Unapprove </td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                               <!-- Viewing the comments-->
                                <?php 
                                $query="SELECT * FROM comments";
                                $viewSQLQuery=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($viewSQLQuery)){
                                    echo "<tr>";
                                    $comment_id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    echo"<td>   {$row['comment_id']}    </td>";
                                    echo"<td>   {$row['comment_post_id']}     </td>";
                                    echo"<td>   {$row['comment_date']}     </td>";
                                    echo"<td>   {$row['comment_author']} </td>";
                                    echo"<td>   {$row['comment_email']}     </td>";
                                    echo"<td>   {$row['comment_content']}    </td>";
                                    $comment_status=$row['comment_status'];
                                    $selectposts="SELECT * FROM posts WHERE post_id={$comment_post_id}";
                                    $selectpostsquery=mysqli_query($connection,$selectposts) or die("Query Failed".mysqli_error($connection));
                                    
                                    while($row=mysqli_fetch_assoc($selectpostsquery)){ //post_id=5 at first
                                             $comment_post_title=$row['post_title'];
                                             $post_id=$row['post_id'];
                                         echo"<td><a href='../view_post.php?p_id={$post_id}'>{$comment_post_title}</a></td>";
                                    }
                                        
                                    echo"<td>{$comment_status}</td>";
                                    echo"<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                    echo"<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                                     echo"<td><a href='comments.php?delete_id=$comment_id'>Delete</a></td>";
                                    echo"</tr>";
                                }

                                ?>
                            </tbody>
                                                        
                        </table>
                        
                       
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
