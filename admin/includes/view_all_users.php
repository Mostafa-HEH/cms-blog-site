<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>RandSalt</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM users";
            $sellect_users = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($sellect_users)) {
                $user_id = $row["user_id"];
                $user_username = $row["user_username"];
                $user_password = $row["user_password"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_email = $row["user_email"];
                $user_image = $row["user_image"];
                $user_role = $row["user_role"];
                $user_randSalt = $row["user_randSalt"];
                                 
                echo "<tr>";
                       echo "<td>$user_id</td>";
                       echo "<td>$user_username</td>";
                       echo "<td>$user_password</td>";   
                       echo "<td>$user_firstname</td>";
                       echo "<td>$user_lastname</td>";
                       echo "<td> $user_email</td>";
                       echo "<td><img src='../images/$user_image' width=50 alt='$user_firstname $user_lastname image'></td>";
                       echo "<td> $user_role</td>";
                       echo "<td>  $user_randSalt</td>";
                       echo "<td><a href='users.php?source=edit_user&post_id={$user_id}'>edit</a></td>";
                       echo "<td><a href='users.php?delete={$user_id}'>delete</a></td>";
                echo "</tr>";
        } ?>
    </tbody>
</table>
        <?php 
            if(isset($_GET['delete'])){
                $delete_user_id = $_GET['delete'];

                $query = "DELETE FROM users WHERE user_id={$delete_user_id}";
                $delete_query = mysqli_query($connection, $query);
                header("location: users.php");

                checkQuery($delete_query);
            }
        ?>