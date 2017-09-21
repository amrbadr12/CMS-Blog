<?php include "includes/header.php";
include("includes/admin_functions.php");
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
                            Posts
                            <small><?php showAuthor();?></small>
                        </h1>
<!--                        view form posts-->
                      <?php include "includes/view_posts.php";?>
                       
                       
                       
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
