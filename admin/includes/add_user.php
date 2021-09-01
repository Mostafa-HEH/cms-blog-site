<?php 
    if(isset($_POST['add_user'])){
        $user_username = $_POST["username"];
        $user_password = $_POST["password"];
        $user_firstname = $_POST["firstname"];
        $user_lastname = $_POST["lasttname"];
        $user_email = $_POST["email"];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = 'subscriber';
        $user_randSalt = '';

        move_uploaded_file($user_image_temp, "../images/$user_image");

        $query = "INSERT INTO users (user_username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, user_randSalt) VALUES ( '$user_username', '$user_password',  '$user_firstname', '$user_lastname' , '$user_email', '$user_image', '$user_role', '$user_randSalt') ";

        $add_user_query = mysqli_query($connection, $query); 
       checkQuery( $add_user_query);
    }
?>
<form action="" method="POST" enctype="multipart/form-data">    
    <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label >Firs Name</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" name="lasttname">
    </div>
    <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label >Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label >Role</label>
        <select class="form-control" name="role">
            <option value="admin" name="admin">admin</option>
            <option value="subscriber" name="subscriber">subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label >randSalt</label>
        <input type="input" class="form-control" name="randSalt">
    </div>
    <!-- <div class="form-group">
        <select name="post_category" id="post_category"> -->
            <?php 
                //  $query = "SELECT * FROM categories ";
                //  $select_categories = mysqli_query($connection, $query);

                //  checkQuery($select_categories);
 
                //  while ($row = mysqli_fetch_assoc($select_categories)) {
                //      $cat_id = $row["cat_id"];
                //      $cat_title = $row["cat_title"]; 

                //      echo "<option value='{$cat_id}'>$cat_title</option>";
                //  }
            ?>
        <!-- </select>
    </div> -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </div>
</form>
    