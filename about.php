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
                    About the Dev
<!--                    <small>Secondary Text</small>-->
                </h1>

                <!-- Blog Posts -->
                <h4>Hello there.</h4>
                <p>My name is Amr Badr from Egypt in my senior year studying computer and communications engineering in Mansoura University, Egypt. I'm an enthusiastic web devloper constantly learning new web technologies and new frameworks
                . Successfully built this CMS as i was learning PHP as well as my experience in designing pages in HTML 5 and CSS  </p>
                <blockquote>Amr Badr</blockquote>
             
            </div>
    
            <!-- Blog Sidebar Widgets Column -->
           <?php 
            include "includes/sidebar.php"
                ?>

        </div>
        <!-- /.row -->

        <hr>
        <?php include "includes/footer.php"?>