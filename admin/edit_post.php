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
                            Edit Post
                            <small><?php showAuthor();?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- editing a post-->
                
                <?php
               
                if(isset($_POST['edit_post']) && isset($_GET['post_edit_id'])){
                    $post_category=$_POST['edit_cat_title'];
                    $post_title=$_POST['title'];
                    $post_author=$_POST['author'];
                    $image=$_FILES['posted_image']['name'];
                    $post_image_temp=$_FILES['posted_image']['tmp_name'];
                    $post_date=date('d-m-y');
                    $post_status=$_POST['post_status'];
                    $post_content=$_POST['content'];
                    $post_tags=$_POST['tags'];
                    $location="../images/'{$image}'";
                    $post_comment_count=10;
                    if(isset($image)){
                    move_uploaded_file($post_image_temp,$location);
                    }
                    else{
                    echo "please select an image";
                    }
                   $update="UPDATE posts SET 
                   post_category_id={$post_category},post_title='{$post_title}',
                   post_author='{$post_author}',post_image='{$image}',
                   post_date=now(),post_status='{$post_status}',
                   post_content ='{$post_content}',post_tags='{$post_tags}',
                   post_comment_count={$post_comment_count}
                   WHERE post_id=".$_GET['post_edit_id'];
                    $updatePosts=mysqli_query($connection,$update) or die("query failed!".mysqli_error($connection));
                    
                }
                ?>
                
            <div class="row">   
    <form action="" method="post" enctype="multipart/form-data">
     
      <div class="form-group">
       <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    
    <div class="form-group">
       <label for="title">Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    
    <div class="form-group">
       <label for="title">Status</label>
       <div class="input-group">
       <select name="post_status">
           <option name="published">Published</option>
           <option name="draft">Draft</option>
       </select>
        </div>
    </div>
    
     <div class="form-group">
       <label for="title">Post Image</label>
        <input type="file" name="posted_image" class="form-control">
        </div>
    
    <div class="form-group">
       <label for="cat_id">Cateogory</label>
       <br>
        <select name="edit_cat_title" id="">
            <?php
            $select_cat="SELECT * FROM categories";
            $selectQuery=mysqli_query($connection,$select_cat) or die("Query Failed");
            if($selectQuery){
                while($row=mysqli_fetch_assoc($selectQuery)){
                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];
                    echo "<option value={$cat_id}>{$cat_title}</option>";
                }
            }
            ?>
        </select>
    </div>
    
   <div class="form-group">
       <label for="title">Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    
    <div class="form-group">
       <label for="title">Content</label>
        <textarea class="form-control" name="content" col="20" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" name="edit_post" class="btn btn-primary" value="Edit Post">
    </div>
                </form>
               <?php
                if(isset($_POST['edit_post'])){
                    showNotification(" Post Edited ");
                }
                
                ?>
                </div>

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