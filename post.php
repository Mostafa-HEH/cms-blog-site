
    <?php include './includes/header.php'?>

<!-- Navigation -->
<?php include './includes/navigation.php'?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                }

                $query = "SELECT * FROM posts WHERE post_id = $post_id ";
                $selec_posts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($selec_posts)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_image = $row['post_image'];

                    
            ?>
                    <h2>
                        <a href='#'><?php echo $post_title ?></a>
                    </h2>
                    <p class='lead'>
                        by <a href='index.php'><?php echo $post_author ?></a>
                    </p>
                    <p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class='img-responsive' src='<?php echo "images/$post_image" ?>' alt=''>
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
                    <hr>
            <?php } ?>

            
                <!-- Comments Form -->
                <?php 
                    if (isset($_POST['create_comment'])){
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_status = 'padding';
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_date, comment_status) VALUES ('$post_id' ,'$comment_author', '$comment_email', '$comment_content', now(), '$comment_status')";
                        $add_comments = mysqli_query($connection, $query);

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id=$post_id";
                        $update_comment_count = mysqli_query($connection, $query);

                    }
                ?>

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" name="comment_author" placeholder="Name" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="comment_email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                  $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approve' ORDER BY comment_id DESC ";
                  $sellect_comments = mysqli_query($connection, $query);
          
                  while ($row = mysqli_fetch_assoc($sellect_comments)) {
                      $comment_author = $row["comment_author"];
                      $comment_content = $row["comment_content"];
                      $comment_date = $row["comment_date"];  
                  
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                        <!-- Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment -->
                    </div>
                </div>

                <?php } ?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include './includes/sidebar.php'?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include './includes/footer.php'?>