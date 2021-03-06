<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM comments";
            $sellect_comments = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($sellect_comments)) {
                $comment_id = $row["comment_id"];
                $comment_author = $row["comment_author"];
                $comment_content = $row["comment_content"];
                $comment_email = $row["comment_email"];
                $comment_status = $row["comment_status"];
                $comment_post_id = $row["comment_post_id"];
                $comment_date = $row["comment_date"];                     
                echo "<tr>";
                       echo "<td>$comment_id</td>";
                       echo "<td>$comment_author</td>";
                       echo "<td>$comment_content</td>";   
                       echo "<td>$comment_email</td>";
                       echo "<td>$comment_status</td>";
                       $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                       $get_title = mysqli_query($connection, $query);
                       while($row = mysqli_fetch_assoc($get_title)){
                           $comment_post_id = $row['post_id'];
                           $comment_post_title = $row['post_title'];
                           echo "<td><a href='../post.php?post_id={$comment_post_id}'>$comment_post_title</a></td>";
                       }
                       echo "<td> $comment_date</td>";
                       echo "<td><a href='comments.php?approve={$comment_id}'>approve</a></td>";
                       echo "<td><a href='comments.php?unapprove={$comment_id}'>unapprove</a></td>";
                       echo "<td><a href='comments.php?source=edit_post&post_id={$comment_id}'>edit</a></td>";
                       echo "<td><a href='comments.php?delete={$comment_id}'>delete</a></td>";
                echo "</tr>";
        } ?>
    </tbody>
</table>
        <?php 
            if(isset($_GET['approve'])){
                $approve_comment_id = $_GET['approve'];

                $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = '$approve_comment_id' ";
                $approve_query = mysqli_query($connection, $query);
                header("location: comments.php");

                checkQuery($delete_query);
            }

            if(isset($_GET['unapprove'])){
                $unapprove_comment_id = $_GET['unapprove'];

                $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = '$unapprove_comment_id' ";
                $unapprove_query = mysqli_query($connection, $query);
                header("location: comments.php");

                checkQuery($delete_query);
            }
            if(isset($_GET['unapprove'])){
                $unupprove_comment_id = $_GET['unapprove'];

                $query = "UPDATE comments SET comment_status = 'unapprove'";
                $unapprove_query = mysqli_query($connection, $query);
                header("location: comments.php");

                checkQuery($delete_query);
            }

            if(isset($_GET['delete'])){
                $delete_comment_id = $_GET['delete'];

                $query = "DELETE FROM comments WHERE comment_id={$delete_comment_id}";
                $delete_query = mysqli_query($connection, $query);
                header("location: comments.php");

                checkQuery($delete_query);
            }
        ?>