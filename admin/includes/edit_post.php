<?php
    if(isset($_GET['post_id'])){
        $pram_post_id = $_GET['post_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $pram_post_id ";
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
        $post_content = $row["post_content"];
    }
    if (isset($_POST['update_post'])){

        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_author = $_POST['author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)) {
        
            $query = "SELECT * FROM posts WHERE post_id = $pram_post_id ";
            $select_image = mysqli_query($connection,$query);
                
            while($row = mysqli_fetch_array($select_image)) {
                
               $post_image = $row['post_image'];
            
            }
        }

        $query = "UPDATE posts SET ";
        $query .="post_title  = '{$post_title}', ";
        $query .="post_category_id = '{$post_category_id}', ";
        $query .="post_date   =  now(), ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_tags   = '{$post_tags}', ";
        $query .="post_content= '{$post_content}', ";
        $query .="post_image  = '{$post_image}' ";
        $query .= "WHERE post_id = {$pram_post_id} ";
        
        $create_post_query = mysqli_query($connection, $query); 
       checkQuery($create_post_query);
    }

?>

<form action="" method="POST" enctype="multipart/form-data">    
    <div class="form-group">
        <label for="title" >Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <select class="form-control" name="post_category" id="post_category">
            <?php 
                 $query = "SELECT * FROM categories ";
                 $select_categories = mysqli_query($connection, $query);

                 checkQuery($select_categories);
 
                 while ($row = mysqli_fetch_assoc($select_categories)) {
                     $cat_id = $row["cat_id"];
                     $cat_title = $row["cat_title"]; 

                     echo "<option value='{$cat_id}'>$cat_title</option>";
                 }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <select class="form-control" name="post_status" value="<?php echo $post_status; ?>">
                 <option <?php if($post_status == 'puplished') echo 'selected' ?> value="puplished" >puplished</option>
                 <option <?php if($post_status == 'draft') echo 'selected' ?> value="draft" >draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image ?>" width="100">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "name="post_content" id="body" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Submit post update">
    </div>
</form>
    