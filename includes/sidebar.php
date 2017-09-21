 <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control"name="search">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                  <!-- Login -->
                  <?php
                if(!isset($_SESSION['username'])){
                echo"<div class='well'>";
                echo"<h4>Login</h4>";
                echo"<form action='includes/login.php' method='post'>";
                echo "<div class='input-group'>";
                echo"<input type='text' class='form-control' name='username'>";
                echo"<input type='password' class='form-control' name='user_password'>";
                echo"<button class='btn btn-default' name='submit'>Login <span class='glyphicon glyphicon-log-in'></span></button>";   
                echo"</div>";
                echo"</form>";
                echo"</div>";
                }
            ?>

                <!-- Blog Categories Well -->
                <div class="well">
                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                     <?php
                   $query="SELECT * FROM categories";
                   $select_sidebar_Category=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_sidebar_Category)){
                        $catTitle=$row['cat_title'];
                        $cat_id=$row['cat_id'];
                         echo"<li><a href='view_category.php?cat_id={$cat_id}'>{$catTitle}</a>";
                    }
                    ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                         <!--   <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>-->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


            </div>