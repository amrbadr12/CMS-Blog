<?php include "includes/header.php";
include "includes/admin_functions.php";

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
                           Users
                           <small>
                            <?php 
                               showAuthor();?>
                           </small>
                        </h1>
                        
                        <?php
                        if(isset($_GET['url'])){
                            if($_GET['url']=="view_users"){
                                include "includes/view_users.php";
                            }
                            else if($_GET['url']=="add_users"){
                                include "includes/add_users.php";
                            }
                            else if($_GET['url']=="edit_users"){
                                include "includes/edit_users.php";
                            }
                        }
                        
                        ?>
                        <?php    
            if(isset($_GET['delete']))
             showNotification(" User deleted ");
       ?>
                        
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
