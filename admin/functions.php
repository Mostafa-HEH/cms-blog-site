<?php 

    function checkQuery($query){
        global $connection;
        if(!$query){
            return die("QUERY FAILD " . mysqli_error($connection));
        }
    }

    function insertCategory(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if ($cat_title == '' || empty($cat_title)){
                echo "<p>You should enter a title.</p>";
            } else {
                $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                $create_category_query = mysqli_query($connection, $query);

                checkQuery($create_category_query);
            }
        }
    }

    function addCategory(){
        global $connection;
        $query = "SELECT * FROM categories";
        $sellect_categories = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($sellect_categories)) {
            $cat_id = $row["cat_id"];
            $cat_title = $row["cat_title"];
            echo "<tr><td>{$cat_id}</td><td>{$cat_title}</td><td><a href='categories.php?delete={$cat_id}'>Delete</a></td><td><a href='categories.php?edit={$cat_id}'>Edit</a></td></tr>";
        }
    }

    function deleteCategory(){
        global $connection;
        if(isset($_GET['delete'])){
            $delete_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id={$delete_cat_id}";
            $delet_query = mysqli_query($connection, $query);
            header("location: categories.php");
        }
    }
?>