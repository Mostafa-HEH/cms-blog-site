<div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <div class="well">
                    <h4>You have account</h4>
                    <form action="includes/login.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username"  placeholder="username">
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="submit_form" >Login</button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
            

                <!-- Blog Categories Well -->
                <div class="well">
                    <?php 
                        $query = "SELECT * FROM categories";
                        $sellect_side_categories = mysqli_query($connection, $query);
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    while ($row = mysqli_fetch_assoc($sellect_side_categories)) {
                                        $cat_title = $row["cat_title"];
                                        $cat_id = $row["cat_id"];
                                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>