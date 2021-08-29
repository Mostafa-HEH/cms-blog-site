<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM posts";
            $sellect_posts = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($sellect_posts)) {
                $post_id = $row["post_id"];
                $post_author = $row["post_author"];
                $post_title = $row["post_title"];
                $post_category = $row["post_category_id"];
                $post_status = $row["post_status"];
                $post_image = $row["post_image"];
                $post_tags = $row["post_tags"];
                $post_comments = $row["post_comment_count"];
                $posts_date = $row["post_date"];
                
                      
                echo "<tr>";
                       echo "<td>$post_id</td>";
                       echo "<td>$post_author</td>";
                       echo "<td>$post_title</td>";
                       $edit_query = "SELECT * FROM categories WHERE cat_id=$post_category";
                       $edit_categories = mysqli_query($connection, $edit_query);
       
                       while ($row = mysqli_fetch_assoc($edit_categories)) {
                           $cat_id = $row["cat_id"];
                           $cat_title = $row["cat_title"];
                           echo "<td>$cat_title</td>";
                       }    
                       echo "<td>$post_status</td>";
                       echo "<td><img src='../images/$post_image' style='height: 5rem;' /></td>";
                       echo "<td>$post_tags</td>";
                       echo "<td>$post_comments</td>";
                       echo "<td>$posts_date</td>";
                       echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
                       echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
        } ?>
    </tbody>
</table>
        <?php 
            if(isset($_GET['delete'])){
                $delete_post_id = $_GET['delete'];

                $query = "DELETE FROM posts WHERE post_id={$delete_post_id}";
                $delete_query = mysqli_query($connection, $query);
                header("location: posts.php");

                checkQuery($delete_query);
            }
        ?>