<?php
function insertCateogory(){
    global $connection;
      if(isset($_POST['submit'])){
                            $added_cateogory=$_POST['cat_title'];
                            if($added_cateogory!=null){
                                $insertCat="INSERT INTO categories(cat_title) VALUES('$added_cateogory')";
                                $insert_cat_status=mysqli_query($connection,$insertCat) or die("SQL query didn't excuete");
                                if($insert_cat_status==false)
                                    echo "Cateogory not inserted!";
                            }
      }
}

function editCateogory(){
    global $connection;
      if(isset($_GET['update_id'])){
                                echo"<form action='' method='post'>";
                                echo"<div class='form-group'>";
                                echo"<label for='cat-title'>Edit a Cateogory</label>";
                                echo"<input type='text' class='form-control' name='edit_cat_title'>";
                                echo"</div>";
                                echo"<div class='form-group'>";
                                echo"<input type='submit' class='btn btn-primary' name='edit' value='Edit Cateogory'>";
                                echo"</div>";
                                echo"</form>";
                                if(isset($_POST['edit'])&&isset($_GET['update_id'])){
                                $enteredEdit=$_POST['edit_cat_title'];
                                $editQuery="UPDATE categories SET cat_title='{$enteredEdit}' WHERE cat_id={$_GET['update_id']}";
                                $editSQLQuery=mysqli_query($connection,$editQuery);
                                header("location:cateogories.php");
                            }
                            else if(!isset($_GET['update_id'])&&isset($_POST['edit'])){
                                echo "You must select a cateogry to edit it.";
                            }
                                
                            }
}



?>