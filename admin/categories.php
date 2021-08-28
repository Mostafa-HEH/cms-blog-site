<?php include 'includes/admin_header.php'?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php  insertCategory(); ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="catTitle">Add category</label>
                                    <input type="text" class="form-control" id="catTitle" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div>
                            </form>

                            <?php // Update and include query
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include 'includes/update_category.php';
                                }
                            ?>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                        <th>Delete category</th>
                                        <th>Update category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php addCategory() ?>
                                <?php deleteCategory() ?>
                                </tbody>
                            </table>
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

<?php include 'includes/admin_footer.php';?> 