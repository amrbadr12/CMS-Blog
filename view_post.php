<?php
include "includes/header.php";
?>
<body>

    <!-- Navigation -->
      <?php include "includes/navigation.php";
        ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Posts -->
                <?php
                if(isset($_GET['p_id'])){
                $p_id=$_GET['p_id'];
                $postQuery="SELECT * from posts WHERE post_id=".$p_id;
                $selectPostsQuery=mysqli_query($connection,$postQuery);
                //as long there's posts in the database, print them on the page
                while($row=mysqli_fetch_assoc($selectPostsQuery)){
                     $post_id=$row['post_id'];
                     $post_title=$row['post_title'];
                     $post_author=$row['post_author'];
                     $post_date=$row['post_date'];
                     $post_content=$row['post_content'];
                     $post_status=$row['post_status'];
                     $post_image=$row['post_image'];
                    echo "<h2><a href='#'>{$post_title}</a></h2>";
                    echo "<p class='lead'> by <a href='index.php'>{$post_author}</a>";
                    echo "<p><span class='glyphicon glyphicon-time'</span> Posted on {$post_date}</p><hr>";
                    echo "<img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
                    echo "<p> {$post_content} </p>";
                    echo "<hr>";
                }
                }
                ?>
            </div>
    
            <!-- Blog Sidebar Widgets Column -->
           <?php 
            include "includes/sidebar.php"
                ?>

        </div>
        <!-- /.row -->
        

        <hr>
        
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="row">
                <div class="well col-md-8">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                       <div class="form-group">
                           <label for="author">Author</label>
                           <input type="text" class="form-control" name="comment_author">
                       </div>
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" class="form-control" name="comment_email">
                       </div>
                        <div class="form-group">
                           <label for="email">Post a comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="publish_comment">Submit</button>
                    </form>
                </div>
                <?php
                $comments_count=0;
                if(isset($_POST['publish_comment'])){
                    $errorMessage="";
                    $comment_author=$_POST['comment_author'];
                    $comment_email=$_POST['comment_email'];
                    $comment_content=$_POST['comment_content'];
                    if($comment_author==null||$comment_email==null||$comment_content==null){
                       if($comment_author==null)
                           $errorMessage.="Author field can't be empty.<br>";
                        if($comment_email==null){
                            $errorMessage.="Email field can't be empty.<br>";
                        }
                        if($comment_content==null)
                            $errorMessage.="Content can't be empty.<br>";
                        echo $errorMessage;
                    }
                    else{
                        $p_comment_id=$_GET['p_id'];
                       $insertQuery="INSERT INTO comments(comment_post_id,comment_date,comment_author,comment_email,comment_content,comment_status)"; $insertQuery.="VALUES({$p_comment_id},now(),'{$comment_author}','{$comment_email}','{$comment_content}','unapproved')";
                       $insertComments=mysqli_query($connection,$insertQuery) or die("Query Failed!");
                       if($insertComments){
                        $updateCommentsCount="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$p_comment_id";
                        $updateCount=mysqli_query($connection,$updateCommentsCount);
                       }
                    }
                }
             ?>
                </div>
                

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
        $post_id=$_GET['p_id'];
        $viewComments="SELECT * FROM comments where comment_post_id=$post_id";
        $comments_query=mysqli_query($connection,$viewComments);
        while($row=mysqli_fetch_assoc($comments_query)){
            $comment_status=$row['comment_status'];
            if($comment_status=='approved'){
            $comment_date=$row['comment_date'];
            $comment_content=$row['comment_content'];
            $comment_author=$row['comment_author'];
                echo"<div class='media'>";
                echo"<a class='pull-left' href='#'>";
                echo"<img class='media-object' src='http://placehold.it/64x64' alt=''>";
                echo"</a>";
                echo"<div class='media-body'>";
                echo"<h4 class='media-heading'>$comment_author ";
                echo"<small>{$comment_date}</small>";
                echo"</h4>";
                echo $comment_content;
                echo"</div>";
                echo"</div>";
            }
        }
                                ?>
                    </div>
                </div>

            </div>

        <?php include "includes/footer.php"?>