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
                            Admin Page
                            <small><?php 
                              showAuthor();?>
                                </small>
                        </h1>
                    </div>
                </div>
                       
                <!-- /.row -->
                <!-- widgets-->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        $select_posts_query="SELECT * FROM POSTS";
                        $count_posts=mysqli_query($connection,$select_posts_query) or die("QUERY FAILED");
                        $posts_num=mysqli_num_rows($count_posts);
                         echo"<div class='huge'>{$posts_num}</div>"
                        ?>
                 
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $select_comments_query="SELECT * FROM COMMENTS";
                        $count_comments=mysqli_query($connection,$select_comments_query) or die("QUERY FAILED");
                        $comments_num=mysqli_num_rows($count_comments);
                         echo"<div class='huge'>{$comments_num}</div>"
                        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $select_users_query="SELECT * FROM users";
                        $count_users=mysqli_query($connection,$select_users_query) or die("QUERY FAILED");
                        $users_num=mysqli_num_rows($count_users);
                         echo"<div class='huge'>{$users_num}</div>"
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php?url=view_users">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <?php
                        $select_cat_query="SELECT * FROM categories";
                        $count_cat=mysqli_query($connection,$select_cat_query) or die("QUERY FAILED");
                        $cat_num=mysqli_num_rows($count_cat);
                         echo"<div class='huge'>{$cat_num}</div>"
                        ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="cateogories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php
            $columns_array=['All Posts','Published Posts','Draft Posts','Pending Comments','Approved Comments','Users','Categories'];
            $all_posts_query=mysqli_query($connection,"SELECT * FROM POSTS");
            $all_posts_num=mysqli_num_rows($all_posts_query);
            $published_posts_query=mysqli_query($connection,"SELECT * FROM POSTS WHERE post_status='published'");
            $published_posts_num=mysqli_num_rows($published_posts_query);
            $draft_posts_query=mysqli_query($connection,"SELECT * FROM POSTS WHERE post_status='draft'");
            $draft_posts_num=mysqli_num_rows($draft_posts_query);
            $pending_comments_query=mysqli_query($connection,"SELECT * FROM comments WHERE comment_status='unapproved'");
            $pending_comments_num=mysqli_num_rows($draft_posts_query);    
            $approved_comments_query="SELECT * FROM COMMENTS WHERE comment_status='approved'";
            $count_approved_comments=mysqli_query($connection,$approved_comments_query) or die("QUERY FAILED");
            $approved_comments_num=mysqli_num_rows($count_approved_comments);
            $data_array=[$all_posts_num,$published_posts_num,$draft_posts_num,$pending_comments_num,$approved_comments_num,$users_num,$cat_num];
            for($i=0;$i<=6;$i++){
            echo "['{$columns_array[$i]}'" . "," . "{$data_array[$i]}],";
            }   
                             ?>
//          ['Posts', 1000],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<div id="columnchart_material" style="width: auto; height: 500px;"></div>

                

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
