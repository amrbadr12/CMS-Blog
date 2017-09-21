 <?php include "includes/db.php"?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Amr CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php
                   $query="SELECT * FROM categories";
                   $selectCategory=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($selectCategory)){
                        $catTitle=$row['cat_title'];
                        $cat_id=$row['cat_id'];
                        echo "<li><a href='view_category.php?cat_id={$cat_id}'>{$catTitle}</a></li>";
                    }
                    ?>
                    <li class="pull-right"><a href="admin/index.php">Admin</a></li>
                    <li class="pull-right"><a href="register.php">Register</a></li>
                    <li class="pull-right"><a href="about.php">About</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
