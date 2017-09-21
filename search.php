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
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Posts -->
                
                <?php
            if(isset($_POST['submit'])){
            $search=$_POST['search'];
            $query="SELECT * FROM posts WHERE post_content LIKE '%$search%'";
            $searchQuery=mysqli_query($connection,$query) or die("query didn't excuete");
            $count=mysqli_num_rows($searchQuery);
            if($count==0){
                echo "<h1> No results found!</h1>";
            }
                else{
                while($row=mysqli_fetch_assoc($searchQuery)){
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
                    echo " <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                    echo "<hr>";
                }
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