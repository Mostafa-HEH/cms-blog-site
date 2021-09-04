<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php 
    if(isset($_POST['submit_form'])){
        $catch_username = $_POST['username'];
        $catch_password = $_POST['password'];

        $catch_username = mysqli_real_escape_string($connection, $catch_username);
        $catch_password = mysqli_real_escape_string($connection, $catch_password);

        $query = " SELECT * FROM users WHERE user_username ='$catch_username' ";
        $query_select_user = mysqli_query($connection, $query );
        while ($row = mysqli_fetch_assoc($query_select_user) ) {
            $password = $row['user_password'];
            $username = $row['user_username'];
            $id = $row['user_id'];
            $firstname = $row['user_firstname'];
            $lastname = $row['user_lastname'];
            $role = $row['user_role'];
            if($catch_username === $username && $catch_password === $password){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $role;
                header("location: ../admin/index.php");
            }else {
                header("location: ../index.php");
            }
        }
    }
?>