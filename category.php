
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
                    if (isset($_GET['category'])){
                        $category_id = $_GET['category'];
                    }

                    $query = "SELECT * FROM posts WHERE post_category_id = $category_id ";
                    $selec_posts = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($selec_posts)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_image = $row['post_image'];

                        
                ?>
                        <h2>
                            <a href='post.php?post_id=<?php echo $post_id ?>'><?php echo $post_title ?></a>
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