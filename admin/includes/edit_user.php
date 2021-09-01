<?php
    if(isset($_GET['post_id'])){
        $pram_post_id = $_GET['post_id'];
    }

    // $query = "SELECT * FROM users WHERE user_id = $pram_post_id ";
    // $sellect_user = mysqli_query($connection, $query);

    // while ($row = mysqli_fetch_assoc($sellect_user)) {
    //      $user_username = $_GET["username"];
    //      $user_password = $_GET["password"];
    //      $user_firstname = $_GET["firstname"];
    //      $user_lastname = $_GET["lastname"];
    //      $user_email = $_GET["email"];
    //      $user_image = $_GET["image"];
    //      $user_role = $_GET["role"];
    //      $user_randSalt = $_GET["randSalt"];
    // }
    if(isset($_POST['update_user'])){
        $user_username = $_POST["username"];
        $user_password = $_POST["password"];
        $user_firstname = $_POST["firstname"];
        $user_lastname = $_POST["lasttname"];
        $user_email = $_POST["email"];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        $user_role = $_POST["role"];
        $user_randSalt = '';

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if(empty($usre_image)) {
        
            $query = "SELECT * FROM users WHERE user_id = $pram_post_id ";
            $select_image = mysqli_query($connection,$query);
                
            while($row = mysqli_fetch_array($select_image)) {
                
               $user_image = $row['user_image'];
            
            }
        }

        $query = "UPDATE users SET ";
        $query .="user_username = '{$user_username}', ";
        $query .="user_password = '{$user_password}', ";
        $query .="user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_image = '{$user_image}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="user_image  = '{$user_image}', ";
        $query .="user_randSalt = '{$user_randSalt}'";
        $query .= "WHERE user_id = {$pram_post_id} ";

        $update_user_query = mysqli_query($connection, $query); 
       checkQuery( $update_user_query);
    }

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
?>
<form action="" method="POST" enctype="multipart/form-data">    
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user_username; ?>">
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <label >Firs Name</label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" name="lasttname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $user_image ?>" width="50">
    </div>
    <div class="form-group">
        <label >Image</label>
        <input type="file" class="form-control" name="image" >
    </div>
    <div class="form-group">
        <label >Role</label>
        <select class="form-control" name="role" >
            <option <?php if($user_role == 'admin') echo 'selected' ?> value="admin" >Admin</option>
            <option <?php if($user_role == 'subscriber') echo 'selected' ?> value="subscriber" >Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label >randSalt</label>
        <input type="input" class="form-control" name="randSalt" value="<?php echo $user_randSalt; ?>">
    </div>
    <?php } ?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
</form>
    