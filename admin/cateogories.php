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
                            Cateogories
                            <small><?php 
                               showAuthor();?></small>
                        </h1>
                        <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Add a Cateogory</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                   <div class="form-group">
                                   <input type="submit" class="btn btn-primary" name="submit" value="Add Cateogory">
                                </div>
                                <div class="col-xs-8">
                                         <?php
                        if(isset($_POST['submit']))
             showNotification(" Cateogory added ");
                        
                ?>
                                </div>
                                 </form>
                                 
                            
                           
                   <!--                         Editing a cateogry                                 -->
                            <?php
                          
                       editCateogory();
                             
                          
                                 
                          // Adding a cateogry to the database 
                                 
                          insertCateogory();
                            
                            ?>
                               
                               
                                </div>
                        
                                  <div class="col-md-4">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Cateogory Title</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $cat_query="SELECT * FROM categories";
                                            $sql_cat_query=mysqli_query($connection,$cat_query);
                                            while($row=mysqli_fetch_assoc($sql_cat_query)){
                                            $title=$row['cat_title'];
                                            $id=$row['cat_id'];
                                            echo"<tr>";
                                            echo"<td>{$id}</td>";
                                            echo"<td>{$title}</td>";
                                            echo"<td><a href='cateogories.php?id={$id}'>Delete</a></td>";
                                            echo"<td><a href='cateogories.php?update_id={$id}'>Update</a></td>";
                                            echo"</tr>";
                                            }
                                            
                                            //delete cateogories from the database
                                            if(isset($_GET['id']))
                                                {
                                                $deleteQuery="DELETE FROM categories where cat_id=".$_GET['id'];
                                                $deleteSQLQuery=mysqli_query($connection,$deleteQuery);
                                               // header("location:cateogories.php");
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                    <?php    
            if(isset($_GET['id']))
             showNotification(" Cateogory deleted ");
       ?>
                                </div>
                                
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
