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

                <h1 class="page-header">
                    Published Posts
<!--                    <small>Secondary Text</small>-->
                </h1>

                <!-- Blog Posts -->
                <?php
                $postQuery="SELECT * from posts";
                $selectPostsQuery=mysqli_query($connection,$postQuery);
                //as long there's posts in the database, print them on the page
                while($row=mysqli_fetch_assoc($selectPostsQuery)){
                     $post_id=$row['post_id'];
                     $post_title=$row['post_title'];
                     $post_author=$row['post_author'];
                     $post_date=$row['post_date'];
                     $post_content=substr($row['post_content'],0,100);
                     $post_status=$row['post_status'];
                     $post_image=$row['post_image'];
                     $img="images/{$post_image}";
                    echo "<h2><a href='view_post.php?p_id={$post_id}'>{$post_title}</a></h2>";
                    echo "<p class='lead'> by <a href='index.php'>{$post_author}</a>";
                    echo "<p><span class='glyphicon glyphicon-time'</span> Posted on {$post_date}</p><hr>";
                    echo "<img class='img-responsive' src='$img' alt=''><hr>";
                    echo "<p> {$post_content} </p>";
                    echo " <a class='btn btn-primary btn-sm' href='view_post.php?p_id={$post_id}'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                    echo "<hr>";
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
        <?php include "includes/footer.php"?>