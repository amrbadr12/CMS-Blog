<!-- TODO fix the category table 119 video -->


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
                if(isset($_GET['cat_id'])){
                $cat_id=$_GET['cat_id'];
                $catQuery="SELECT * from posts WHERE post_category_id={$cat_id}";
                $viewCatQuery=mysqli_query($connection,$catQuery);
                   while($row=mysqli_fetch_assoc($viewCatQuery)){
                   $post_id=$row['post_id'];
                     $post_title=$row['post_title'];
                     $post_author=$row['post_author'];
                     $post_date=$row['post_date'];
                     $post_content=$row['post_content'];
                     $post_status=$row['post_status'];
                     $post_image=$row['post_image'];
                    echo "<h2><a href='view_post.php?p_id={$post_id}'>{$post_title}</a></h2>";
                    echo "<p class='lead'> by <a href='index.php'>{$post_author}</a>";
                    echo "<p><span class='glyphicon glyphicon-time'</span> Posted on {$post_date}</p><hr>";
                    echo "<img class='img-responsive' src='images/{$post_image}' alt=''><hr>";
                    echo "<p> {$post_content} </p>";
                    echo " <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
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
        <?php include "includes/footer.php"?>