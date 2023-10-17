<?php
if(isset($_GET['post_id'])){
    $edit_post_id = $_GET['post_id'];
    $select_all_query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
    $select_all_result = mysqli_query($connection,$select_all_query);

    while($row=mysqli_fetch_assoc($select_all_result)){
    $post_id = $row['post_id']; 
    $post_title = $row['post_title'];
    $post_content = $row['post_content'];
    $post_author = $row['post_author'];
    $post_image =$row['post_image'];
    $post_date = $row['post_date'];
    $post_tags = $row['post_tags'];
    $post_category_id = $row['post_category_id'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
}
}
if(isset($_POST['add_new_post']) && isset($_FILES['post_image'])&& isset($_GET['post_id'])){
$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category_id'];
$post_author = $_POST['post_author'];
$post_status = $_POST['post_status'];
$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('y-m-d');
$post_comment_count = 4;  
$edit_post_id = $_GET['post_id'];


$post_image =$_FILES["post_image"]["name"];
$post_image_tmp = $_FILES["post_image"]["tmp_name"];
// echo $post_image;
// print_r($post_image_tmp);
move_uploaded_file($post_image_tmp,"../img/$post_image");

if(empty($post_image)){
    $post_no_image_query = "SELECT * FROM posts WHERE post_id='$edit_post_id'";
    $post_no_image_result = mysqli_query($connection,$post_no_image_query);
    while($row = mysqli_fetch_assoc($post_no_image_result)){
        $post_image =$row['post_image'];
    }
}

$create_post_query="UPDATE posts SET post_title='$post_title',post_category_id=$post_category_id,post_author='$post_author',post_image='$post_image', 
post_status='$post_status', post_tags='$post_tags', post_content='$post_content', post_comment_count=$post_comment_count WHERE post_id=$edit_post_id";
$create_post_result=mysqli_query($connection,$create_post_query);
if(!$create_post_result){
    echo('Query failed').mysqli_error;
}else{
    header('location:posts.php');
}

}


?>

<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="container-fluid">
                <div class = "card shadow mb-3">
                <div class = "container-fluid">   
                    <div class = "card shadow mb-4">
                            <div class = "card-header py-3">
                                <h6 class = "m-0 font-weight-bold text-primary">Edit Posts</h6>
                            </div>
                            <div class = "card-body">
                                <form action="posts.php?page=edit_posts&post_id=<?php echo $edit_post_id?>" method ="post" enctype ="multipart/form-data">
                                    <div class = "form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" value="<?php echo $post_title ?>" class="form-control" name="post_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Category</label><br>

                                        <select name="post_category_id" id="">
                                        <?php 
                                            
                                            $select_all_query = "SELECT * FROM category WHERE category_id=$post_category_id";
                                            $select_all_result = mysqli_query($connection,$select_all_query);

                                            while($row=mysqli_fetch_assoc($select_all_result)){
                                                $cat_id = $row['category_id']; 
                                                $cat_title = $row['category_title'];
                                                
                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                            ?>
                                            <?php 
                                            
                                            $select_all_query = "SELECT * FROM category";
                                            $select_all_result = mysqli_query($connection,$select_all_query);

                                            while($row=mysqli_fetch_assoc($select_all_result)){
                                                $cat_id = $row['category_id']; 
                                                $cat_title = $row['category_title'];
                                                
                                                echo "<option value='$cat_id'>$cat_title</option>";
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Author</label>
                                        <input type="text" value="<?php echo $post_author ?>" class="form-control" name="post_author">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Image</label><br>
                                        <img src="../../img/<?php echo $post_image ?>" width="150px" alt=""><br><br>
                                        <input type="file" value="<?php echo $post_image ?>" class="form-control" name="post_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Status</label><br>
                                        <select name="post_status" id="">
                                            <option value="published">published</option>
                                            <option value="unpublished">unpublished</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Post Tags</label>
                                        <input type="text" value="<?php echo $post_tags ?>" class="form-control" name="post_tags">
                                    </div>
                                    <div class="form-group" id="editor">
                                        <label for="post_content">Post Content</label>
                                        <textarea name="post_content" id="editor" cols="30" rows="8" class="form-control" value="" ><?php echo $post_content ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Edit post" class="btn btn-primary" name="add_new_post">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
</div>
